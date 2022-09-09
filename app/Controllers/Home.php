<?php


namespace App\Controllers;

use App\Models\ProductsModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;


class Home extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        $model = new ProductsModel();
        $data = [
            'message' => '1',
            'cakes' => $model->findAll()
        ];
        return view('products_home',$data);
    }

    public function create($id = '')
    {
       if($id != ''){
        try {

            $model = new ProductsModel();
            $cake = $model->findProductByID($id);
            

          
            $data = [
                'message' => '1',
                'cake' => $cake,
                
            ];
    
            return view('add_product_view',$data);
            
        } catch (Exception $exception) {
            $data = [
                'message' => $exception->getMessage()
            ];
           // var_dump($data);
           // return redirect('/', 'refresh');
        }
       }
        return view('add_product_view');
    }

    public function destroy($id)
    {
        try {

            $model = new ProductsModel();
            $client = $model->findProductByID($id);
            $model->delete($client);

          

    

            
        } catch (Exception $exception) {
            $data = [
                'message' => $exception->getMessage()
            ];
            
           
        }

        return redirect('/', 'refresh');
    }

    public function update($id)
    {
      

            $model = new ProductsModel();
            $model->findProductByID($id);

            $input =  $this->request->getJSON() ?? $this->request->getRawInput();
         

            $model->update($id, $input);
          

          
            

      

        return redirect('/', 'refresh');
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
            $data = [
                'message' =>  $this->validator->getErrors(),
                'cake' => $input
               
            ];
    
            return view('add_product_view',$data);
            // return $this
            //     ->respond(
            //         $this->validator->getErrors(),
            //         ResponseInterface::HTTP_BAD_REQUEST
            //     );
        }

        $model = new ProductsModel();
        $insertID = $model->insert($input,true);
        

        $client = $model->where('id', $insertID)->first();
        $data = [
            'message' => 'Client added successfully',
            'client' => $client
        ];
        return redirect('/', 'refresh');
    }
}
