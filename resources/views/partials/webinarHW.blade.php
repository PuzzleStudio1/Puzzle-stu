<h5 class="card-title align-items-start flex-column mb-2">
    <span class="card-label font-weight-bolder text-dark">تکالیف:</span>
</h5>

<table class="table table-borderless mb-10">
    <tbody>
        <!--begin::Item-->
        @forelse ($homeworks as $homework)
        <tr>
            <td class="w-40px pl-0 pr-2">
                <!--begin::Symbol-->
                <div class="symbol symbol-40 symbol-light-info align-middle">
                    <span class="symbol-label">
                        <span class="svg-icon svg-icon-lg svg-icon-info">
                            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Home/Library.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <path
                                        d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z"
                                        fill="#000000"></path>
                                    <rect fill="#000000" opacity="0.3"
                                        transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)"
                                        x="16.3255682" y="2.94551858" width="3" height="18" rx="1"></rect>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                    </span>
                </div>
                <!--end::Symbol-->
            </td>
            <td class="w-150px align-middle">                
                <div class="text-dark text-hover-primary mb-1 font-size-lg font-weight-bold">{{ $homework->name }}</div>
                <span class="text-muted">{{ $homework->description }}</span>
            </td>
            <td class="font-weight-bolder font-size-lg text-dark-75 text-right align-middle" style="direction: ltr;">
                {{ round($homework->file->size / 1024 / 1024, 2) }} MB</td>
            <td class="font-weight-bolder font-size-lg w-25 text-right align-middle">
                <a href="{{ route('file.show', $homework->file->id) }}" class="btn btn-success">
                    <i class="flaticon-download"></i> دانلود
                </a>
            </td>
        </tr>
        <!--end::Item-->
        @empty
        <tr>
            <td class="w-40px pl-0 pr-2">
                <!--begin::Symbol-->
                <div class="symbol symbol-40 symbol-light-danger align-middle">
                    <span class="symbol-label">
                        <span class="svg-icon svg-icon-lg svg-icon-danger">
                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-02-01-052524/theme/html/demo1/dist/../src/media/svg/icons/Code/Warning-2.svg--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path
                                        d="M11.1669899,4.49941818 L2.82535718,19.5143571 C2.557144,19.9971408 2.7310878,20.6059441 3.21387153,20.8741573 C3.36242953,20.9566895 3.52957021,21 3.69951446,21 L21.2169432,21 C21.7692279,21 22.2169432,20.5522847 22.2169432,20 C22.2169432,19.8159952 22.1661743,19.6355579 22.070225,19.47855 L12.894429,4.4636111 C12.6064401,3.99235656 11.9909517,3.84379039 11.5196972,4.13177928 C11.3723594,4.22181902 11.2508468,4.34847583 11.1669899,4.49941818 Z"
                                        fill="#000000" opacity="0.3" />
                                    <rect fill="#000000" x="11" y="9" width="2" height="7" rx="1" />
                                    <rect fill="#000000" x="11" y="17" width="2" height="2" rx="1" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                    </span>
                </div>
                <!--end::Symbol-->
            </td>
            <td class="font-size-lg font-weight-bolder text-dark-75 w-100 align-middle">هیچ تکلیفی برای این دوره ثبت
                نشده است!!</td>
        </tr>
        @endforelse
    </tbody>
</table>