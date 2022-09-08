<?php

namespace App\Controllers;

use App\Models\ProductsModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\API\ResponseTrait;
use Exception;

class ProductsController extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        $model = new ProductsModel();
        $data = [
            'message' => 'Products retrieved successfully',
            'cakes' => $model->findAll()
        ];
        return $this->respond($data, 200);
    }

    public function store()
    {
        $rules = [
            'name' => 'required',
            'recipe' => 'required|min_length[6]|max_length[255]',
            'type' => 'required|max_length[255]',
            'price' => 'required|max_length[255]'
        ];

        $input = $this->request->getJSON() ?? $this->request->getRawInput();





        if (!$this->validateRequest($input, $rules)) {
            return $this
                ->respond(
                    $this->validator->getErrors(),
                    ResponseInterface::HTTP_BAD_REQUEST
                );
        }

        $model = new ProductsModel();
        $insertID = $model->insert($input,true);
        

        $client = $model->where('id', $insertID)->first();
        $data = [
            'message' => 'Client added successfully',
            'client' => $client
        ];
        return $this->respond(
            $data,200
        );
    }

    public function search(){
        try{
            $model = new ProductsModel();
            $val = $this->request->getVar('search_input');
            $cakes = $model->findProductByName($val);
            
            $data =  [
                'message' => '1',
                'cakes' => $cakes
            ]; 

        }catch (Exception $e){
            $data = [
                'message' => 'Could not find product for specified name'
            ];
           
        }
        return view('products_search',$data);
    }

    public function filter(){
        try{
            $model = new ProductsModel();
            $val = $this->request->getVar('search_input');
            $cakes = $model->findProductByCategory($val);
            
            $data =  [
                'message' => '1',
                'cakes' => $cakes
            ]; 
            return $this->respond($data,200);
        }catch (Exception $e){
            $data = [
                'message' => 'Could not find product for specified name'
            ];
            return $this->respond($data,ResponseInterface::HTTP_NOT_FOUND);
        }
      
    }

    public function ViewProduct($id)
    {
        try {

            $model = new ProductsModel();
            $cake = $model->findProductByID($id);
            $data =  [
                'message' => '1',
                'cake' => $cake
            ];

        } catch (Exception $e) {
            $data = [
                'message' => 'Could not find product for specified ID'
            ];
           
        }

        return view('product_view',$data);
    }


    public function show($id)
    {
        try {

            $model = new ProductsModel();
            $cake = $model->findProductByID($id);
            $data =  [
                'message' => 'Product retrieved successfully',
                'cake' => $cake
            ];
            return $this->respond($data, 200);

        } catch (Exception $e) {
            $data = [
                'message' => 'Could not find product for specified ID'
            ];
            $this->respond($data, ResponseInterface::HTTP_NOT_FOUND);
           
        }
    }

    public function update($id)
    {
        try {

            $model = new ProductsModel();
            $model->findProductByID($id);

            $input = $this->request->getJSON();

            $model->update($id, $input);
            $client = $model->findProductByID($id);

            $data = [
                'message' => 'Product updated successfully',
                'client' => $client
            ];
            return $this->respond($data,200);

        } catch (Exception $exception) {
            $data  = [
                'message' => $exception->getMessage()
            ];
            return $this->respond($data,ResponseInterface::HTTP_NOT_FOUND);
        }
    }

    public function destroy($id)
    {
        try {

            $model = new ProductsModel();
            $client = $model->findProductByID($id);
            $model->delete($client);

            $data =  [
                'message' => 'Product deleted successfully',
            ];

            return $this->respond($data,200);

            
        } catch (Exception $exception) {
            $data = [
                'message' => $exception->getMessage()
            ];
            return $this->respond($data,ResponseInterface::HTTP_NOT_FOUND);
           
        }
    }
}