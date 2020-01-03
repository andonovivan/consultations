<?php

use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $room = new \App\Room(['name' => '117']);
        $room->save();
        $room = new \App\Room(['name' => '225']);
        $room->save();
        $room = new \App\Room(['name' => '200ab']);
        $room->save();
        $room = new \App\Room(['name' => '200v']);
        $room->save();
        $room = new \App\Room(['name' => '138']);
        $room->save();
        $room = new \App\Room(['name' => 'B2.1']);
        $room->save();
        $room = new \App\Room(['name' => 'B2.2']);
        $room->save();
        $room = new \App\Room(['name' => 'B3.1']);
        $room->save();
        $room = new \App\Room(['name' => 'B3.2']);
        $room->save();
    }
}
