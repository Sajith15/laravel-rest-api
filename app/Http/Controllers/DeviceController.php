<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;

class DeviceController extends Controller
{
    function list($id=null)
    {
        return $id?(Device::find($id)):(Device::all());
    }

    function search($name=null)
    {
        return Device::where("name", "like", "%".$name."%")->get();
    }
    
    function count($name=null){
        $result = Device::where("name", "like", "%".$name."%")->get();
        if(count($result)){
            return count($result)." Record(s) are found";
        } else {
            return ["Result"=>"No records found"];
        }
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

    function delete(Request $req) {
        $device = Device::find($req->id);

        try {
            $result = $device->delete();

            if($result) {
                return ["Result"=>"Data has been deleted"];
            } else {
                throw new Exception($result);
            }
        } catch (Exception $e) {
            return ["Error"=>$e->getMessage()];
        }
    }
}