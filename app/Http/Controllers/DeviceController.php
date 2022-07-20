<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;

class DeviceController extends Controller
{
    function list($id=null)
    {
        return $id?Device::find($id):Device::all();
    }

    function add(Request $req) {
        $device = new Device;

        try {
            $device->name = $req->name;
            $device->model = $req->model;
            $device->serial_number = $req->serial_number;

            $result = $device->save();

            if($result) {
                return ["Result"=>"Data has been saved"];
            } else {
                throw new Exception($result);
            }
        } catch (Exception $e) {
            return ["Error"=>$e->getMessage()];
        }
    }

    function update(Request $req) {
        $device = Device::find($req->id);

        try {
            $device->name = $req->name;
            $device->model = $req->model;
            $device->serial_number = $req->serial_number;

            $result = $device->save();

            if($result) {
                return ["Result"=>"Data has been updated"];
            } else {
                throw new Exception($result);
            }
        } catch (Exception $e) {
            return ["Error"=>$e->getMessage()];
        }
    }
}