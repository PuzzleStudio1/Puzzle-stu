<?php

namespace App\Http\Controllers;

use App\Course;
use App\User;
use App\Classroom;
use App\Absence;
use App\TwoFactor;
use Melipayamak\MelipayamakApi;
use Intervention\Image\Facades\Image;
use Hekmatinasser\Verta\Verta;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Carbon\Carbon;

use Exception;

class AdminController extends Controller
{
    public function dashboard()
    {
        $sms_api = Http::get('https://api.kavenegar.com/v1/49572F54444A4F6E5562544C6550527779385845514F2F6D67336475446F3075/account/info.json');
        $sms = $sms_api->json();
        $sms_money = $sms['entries']['remaincredit'];

        $classrooms = Classroom::where('player_id', '!=', null)->with('player')->get();
        $users = User::count();
        $courses = Course::count();
        $absences = Absence::count();
        $twofactor = TwoFactor::count();

        $free = shell_exec('free');
        $free = (string) trim($free);
        $free_arr = explode("\n", $free);
        if (isset($free_arr[1])) {
            $mem = explode(" ", $free_arr[1]);
            $mem = array_filter($mem);
            $mem = array_merge($mem);
            $usedmem = $mem[2];
            $usedmemInGB = number_format($usedmem / 1048576, 2) . ' GB';
            $memory1 = $mem[2] / $mem[1] * 100;
            $memory = round($memory1);
        } else {
            $memory = '';
        }
        $fh = fopen('/proc/meminfo', 'r');
        $mem = 0;
        while ($line = fgets($fh)) {
            $pieces = array();
            if (preg_match('/^MemTotal:\s+(\d+)\skB$/', $line, $pieces)) {
                $mem = $pieces[1];
                break;
            }
        }
        fclose($fh);
        $totalram = number_format($mem / 1048576, 2) . ' GB';
        //cpu usage
        $cpu_load = sys_getloadavg();
        $load = $cpu_load[0];

        return view('admin.dashboard', compact('classrooms', 'users', 'courses', 'absences', 'twofactor', 'load', 'memory', 'sms_money'));
    }

    public function smsTest()
    {
        try {
            $username = '09123273140';
            $password = '2454';
            $api = new MelipayamakApi($username, $password);
            $sms = $api->sms('soap');
            $to = '09120643390';
            $text = [123654];
            $bodyId = 22468;

            $response = $sms->sendByBaseNumber($text, $to, $bodyId);
            $json = json_decode($response);
            echo $json; //RecId or Error Number 
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function imageresize()
    {
        $courses = Course::all();
        foreach ($courses as $course) {
            Image::make('storage/image/' . $course->photo->name)->resize(380, 380)->save('storage/image/' . $course->photo->name);
        }
        return redirect()->route('home')->with('success', true);
    }

    public function upload()
    {
        return view('admin.upload');
    }

    public function uploadStore()
    {
        return redirect()->route('admin.upload.store')->with('success', true);
    }

    public function twofactor()
    {
        $twofactors = TwoFactor::all();
        return view('admin.twofactor', compact('twofactors'));
    }

    public function kavimo()
    {
        $kavimo_cat_api = Http::get('https://video.puzzle-stu.com/api/v1/projects/?access-token=xUi71D14MG0jq0DAue-NKVvNeA4HSTEH');
        $kavimo_category = $kavimo_cat_api->json();
        $kavimo_api = Http::get('https://video.puzzle-stu.com/api/v1/medias/?access-token=xUi71D14MG0jq0DAue-NKVvNeA4HSTEH');
        $kavimo_videos = $kavimo_api->json();
        // dd($kavimo_videos);

        return view('admin.kavimo', compact('kavimo_category', 'kavimo_videos'));
    }

    public function calendar()
    {
        Carbon::setWeekStartsAt(Carbon::SATURDAY);
        Carbon::setWeekEndsAt(Carbon::FRIDAY);
        $todayClasses = Classroom::whereBetween('classroom_date', [Carbon::now()->subDays(100), Carbon::now()->endOfMonth()])->get();
        return view('admin.calendar', compact('todayClasses'));
    }

    public function invoiceCreate()
    {

        return view('admin.invoice.create');
    }

    public function livecheck()
    {
        $classrooms = Classroom::where('player_id', '!=', null)->with('player')->get();

        return view('admin.livecheck', compact('classrooms'));
    }

    public function invoiceDemo(Request $request)
    {
        return view('admin.invoice.invoice', compact('request'));
    }
}
