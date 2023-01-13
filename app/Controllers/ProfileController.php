<?php

namespace App\Controllers;

use App\Models\Users;
use Myth\Auth\Password;

class ProfileController extends BaseController {
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
            'user_image' => $imageName,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        session()->setFlashdata('pesan', 'Data Product berhasil diupdate');

        return redirect('profile');   

    }

    public function changePassword()
    {
        $id = $this->request->getVar('id');
        $oldPassword = $this->request->getVar('old-password');
        $newPassword = $this->request->getVar('new-password');

        $password = user()->password_hash;

        // base64_encode(hash('sha384', service('request')->getPost('newPasswords'), true))

        if (password_verify(base64_encode(hash('sha384', $oldPassword, true)), $password)) {
            
            $newPassword = Password::hash($newPassword);

            $this->users->updatePassword(user_id(), $newPassword);

            session()->setFlashdata('success', "Your password has been changed!");

            return redirect('profile');
        } else {
            session()->setFlashdata('fail', "The password you entered doesn't match!");
            
            return redirect('changePassword');
        }
    }

    public function forgotPassword()
    {
        $data['title'] = 'Forgot Password';

        return view('pages/forgotPassword', $data);
    }

    public function resetPassword()
    {
        $data['title'] = 'Reset Password';

        return view('pages/resetPassword', $data);
    }

}