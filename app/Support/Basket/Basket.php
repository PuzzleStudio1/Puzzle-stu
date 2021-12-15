<?php

namespace App\Support\Basket;

use App\Course;
use App\Exceptions\QuantityExceededException;
use App\Product;
use App\Support\Storage\Contracts\StorageInterface;


class Basket
{
    private $storage;

    public function __construct(StorageInterface $storage)
    {
        $this->storage = $storage;
    }


    public function add(Course $course)
    {
        if ($this->has($course)) {
            $quantity = $this->get($product)['quantity'] + $quantity;
        }

        $this->storage->set($course->id);

    }


    public function get(Course $course)
    {
        return $this->storage->get($course->id);
    }

    public function remove(Course $course)
    {
        return $this->storage->unset($course->id);
    }

    public function all()
    {
        $courses = Course::find(array_keys($this->storage->all()));

        // foreach ($courses as $course) {
        //     $course->quantity = $this->get($product)['quantity'];
        // }

        return $courses;
    }


    public function subTotal()
    {
        $total = 0;
        
        foreach ($this->all() as $item) {
            if ($item->discount_rice != null) {
                $total += $item->discount_price;
            } else {
                $total += $item->price;
            }
        }

        return $total;
    }


    public function itemCount()
    {
        return $this->storage->count();
    }


    public function has(Course $course)
    {
        return $this->storage->exists($course->id);
    }


    public function clear()
    {
        return $this->storage->clear();
    }
}
