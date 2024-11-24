<?php

class AdminProductController
{

    public function index()
{
        $message = $_SESSION['message'] ?? '';
        unset($_SESSION['message']); 
        $products = (new Product)->all();
        return view('admin.products.list', compact('products', 'message'));
    }


    public function add()
    {
    $categories = (new Category)->all();
    return view('admin.products.add', compact('categories'));
}

  
    


    public function store()
    {
        $data = $_POST;
        $image = ''; 
        $file = $_FILES['image'];
        if ($file['size'] > 0) {
            $image = $file['name'];

            move_uploaded_file($file['tmp_name'], "../images/" . $image);
        }

        $data['image'] = $image;
        $product = new Product;
        $product->create($data);
        $_SESSION['message']="Thêm dữ liệu thành công";
        header("Location: " . ADMIN_URL . "?ctl=listsp");
    }


    public function edit()
    {
       
    }


    public function update()
    {
       
    }


    public function delete()
    {
       
    }
}