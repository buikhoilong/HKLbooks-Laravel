<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function getAllCategory(){
        $category = Category::all();
        return view('Admin.category.index_category',compact('category'));
    }


    public function getAddCategory(){
        return view('Admin.category.add_category');
    }

    public function postAddCategory(Request $request){
        $category = new Category;
        $bien = $request->tentxt;
        $tam =substr($bien,0,1);
        for($i = 0 ; $i < strlen($bien);$i++ ){
            if(ord($bien[$i])==32){
                $tam = $tam.substr($bien,$i+1,1);
            }
        }
        $category->Id = strtoupper($tam);
        $category->Name = $request->tentxt;
        $category->Description = $request->motatxt;
        $category->Status = 1;
        $category->save();
        return redirect()->route('index_category');
    }

    public function getUpdateCategory($id){
        $category = Category::find($id);
        return view('Admin.category.edit_category',compact('category'));
    }

    
    public function postUpdateCategory(Request $request){
        Category::where('Id',$request->Id)->update(
            [
                'Name'=>$request->tentxt,
                'Description'=>$request->motatxt,
            ]
        );
        return redirect()->route('index_category');
    }


    public function deleteCategory($id){
        Category::where('Id',$id)->update([
            'Status' => 0,
        ]);
        return redirect()->route('index_category');
    }




    public function getUpdateDeleteCategory(){
        $category = Category::all();
        return view('Admin.category.delete_category',compact('category'));
    }

    public function postUpdateDeleteCategory($id){
        Category::where('Id',$id)->update([
            'Status' => 1,
        ]);
        return redirect()->route('edit_delete_category');
    }
}
