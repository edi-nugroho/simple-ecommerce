<?php

namespace App\Controllers;
use App\Models\Users;

class Profile extends BaseController {
    protected $users;

    public function __construct()
    {
        $this->users = new Users();
    }

    public function updateProfile($id)
    {
        $name = $this->request->getVar('name');
        $username = $this->request->getVar('username');
        $phone_number = $this->request->getVar('phone_number');
        $address = $this->request->getVar('address');
        $image = $this->request->getFile('user_image');

        // Image
        if ($image->getError() == 4) {
            $imageName = $this->request->getVar('user_image_lama');
        } else {
            // Image Configuration
            $image->move('img/profile');
    
            $imageName = $image->getName();

            if($this->request->getVar('user_image_lama') != "default.png") {
                // Hapus File Gambar Lama
                unlink('img/profile/' . $this->request->getVar('user_image_lama'));
            }
        }

        $this->users->save([
            'id' => $id,
            'name' => $name,
            'username' => $username,
            'phone_number' => $phone_number,
            'address' => $address,
            'user_image' => $imageName
        ]);

        session()->setFlashdata('pesan', 'Data Product berhasil diupdate');

        return redirect('profile');   

    }

}