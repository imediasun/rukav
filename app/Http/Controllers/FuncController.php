<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Site_categories;
use Auth;
class FuncController extends Controller
{
    //
	private $parent_num=0;
    public $all_subcats=[];
    public $all_parcats=[];
    public $level=0;

    //TODO OOP
    //TODO Перенести всю логику связанную с категориями в FuncCategoriesController
    //TODO OOP
	  public function recursive_cat_names($name,$id_cat){
        $this->parent_num=$this->parent_num+1;
        $data['parent']=DB::table('product_categories')->where('id', $id_cat)->get();
        if($data['parent'][0]->parent_id==0){

            $_name=$data['parent'][0]->name.' > '.$name;
            $this->cat_name=$_name;

        }
        else{
            $id_cat=$data['parent'][0]->parent_id;
            if($name!==''){
                $name=$data['parent'][0]->name.' > '.$name;
            }
            else{
                $name=$data['parent'][0]->name;
            }
            $this->recursive_cat_names($name,$id_cat);
        }


       if(isset($this->cat_name)){
       $cat_info['name']=$this->cat_name;
       $cat_info['parent_num']=$this->parent_num;
       return $cat_info;
       }

    }

    private function makeSingleArray($arr){
        if(!is_array($arr)) return false;
        $tmp = array();
        foreach($arr as $val){
            if(is_array($val)){
                $tmp = array_merge($tmp, $this->makeSingleArray($val));
            } else {
                $tmp[] = $val;
            }
        }
        return $tmp;
    }

 public function show_subcat(Request $request){
	$id_cat=$request->input('id_cat');
	$is_user=$request->input('is_user');
    $data=$this->print_subcat($id_cat);
    //var_dump($data);
    //проверка для кейса когда нужно вывести конкретные категории по текущему юзеру
    if($is_user==1 && $data['message']=='success'){

        if(Auth::guard('admin')->user()){
        $user=Auth::guard('admin')->user()->id;
        $user_categories= Site_categories::where('user_id', $user)
            ->get();
            foreach($data['value'] as $category){
                if (in_array($category->id, unserialize($user_categories[0]->categories))) {
                    $_data['categories'][] = $category;
                }
            }
        }
        else{
            foreach($data['value'] as $category){
               $is_children=\App\Category::where('parent_id',$category->id)->get();

               if(count($is_children)>0){
                    $_data['categories'][] = $category;
            }

            }
        }
        //var_dump($data);

    $data['value']=(isset($_data['categories'])) ? $_data['categories'] : null;
    }
    //var_dump($data);
     if($data['value']){return json_encode($data);}else{return json_encode('stop');}

    }


    public function show_subcat_all_levels(Request $request){
        $id_cat=$request->input('id_cat');


        $data=$this->get_all_subcats($id_cat,0);


        $arrOut = $this->makeSingleArray($data);


        $parrent_cats=$this->get_all_parent_cats($id_cat);
         if($parrent_cats){
        foreach($parrent_cats as $value){
            $temp=DB::table('product_categories')->where('id',$value)->get();
            if(!empty($arrOut)){

             array_push($arrOut,(array)$temp[0]);
            }
            else{

                $arrOut[0]=(array)$temp[0];
            }

        }
    }

        return json_encode($arrOut);
    }

    //ToDo:: make one function from show_subcat_levels && show_subcat_levels_back
    public function show_subcat_all_levels_back(Request $request){
        $id_cat=$request->input('id_cat');


        $data=$this->get_all_subcats($id_cat,0);


        $arrOut = $this->makeSingleArray($data);
        $children_cats=$this->get_all_children_cats($id_cat);
        if($children_cats){
        return json_encode($children_cats);}
    }

    public function show_parent_cats(Request $request){
        $id_cat=$request->input('id_cat');
        $cat=DB::table('product_categories')->where('id', $id_cat)->get();
        $parent_id=$cat[0]->parent_id;
        if($parent_id==0){
        $cats['values']=DB::table('product_categories')->where('parent_id', 0)->get();


        $cats['id_cat']=$cat[0]->id;
        }
        else{
        $parent=DB::table('product_categories')->where('id', $parent_id)->get();
        $main_parent=$parent[0]->parent_id;
        $cats['values']=DB::table('product_categories')->where('parent_id',$main_parent)->get();
        $cats['id_cat']=$parent[0]->id;
        }

        return $cats;
    }

    private function get_all_children_cats($id_cat){
        //рекурсивная функция
        $this->all_chilcats=DB::table('product_categories')->where('parent_id', $id_cat)->get();

        return $this->all_chilcats;
    }


    private function get_all_parent_cats($id_cat){
        //рекурсивная функция
        $cat=DB::table('product_categories')->where('id', $id_cat)->get();
        $parent_id=$cat[0]->parent_id;
        //Выбрать из базы рекурсивно все родительские элементы
        $parent=DB::table('product_categories')->where('id', $parent_id)->get();
        //var_dump($parent);
        if(count($parent)>0){
          array_push($this->all_parcats,$parent_id);
                if($temperary=$this->get_all_parent_cats($parent[0]->id)==false){
                }
         }
        else{
            return $this->all_parcats;
        }
        return $this->all_parcats;
    }

    private function get_all_subcats($id_cat,$level){
    //рекурсивно
        //Выбрать из базы рекурсивно все дочерние элементы
        $temp=DB::table('product_categories')->where('parent_id', $id_cat)->get();
        if(count($temp)>0){
        array_push($this->all_subcats,(array)$temp);
            foreach($temp as $value){
             //$level++;var_dump($level);var_dump('value',$value->id);
                if($temperary=$this->get_all_subcats($value->id,$level)!==false){
                    if(is_object($temperary)){
                    array_push($this->all_subcats,(array)$temperary );}
                }
                else{

                    return $this->all_subcats;
               }
            }
        }
        else{
        return false;
        }



    }

    public function print_subcat($id_cat){

    //find all categories which have parent_id = id_cat
    $data['value']=DB::table('product_categories')->where('parent_id', $id_cat)->get();
    $data['message']='success';
    if(count($data['value'])<1){
        $data['value']['id']=$id_cat;
        $name='';

        $data['value']['info']=$this->recursive_cat_names($name,$id_cat);
       $data['message']='null';
    }
    return $data;
    }


    public function show_property_categories(Request $request){
    $id=$request->input('prop');

   $data['property']=DB::table('property_category')->where('property_id',$id)->get();


        //Получить все категории связанные с этим свойством
      /*  $cats=$data['property'][0]->category_id;
        $cats=explode(',' ,$cats );*/

        
        foreach($data['property'] as $cat){
            //сформировать строку полный путь к категории
            $data['info'][]=$this->print_subcat($cat->category_id);

        }

    return json_encode($data['info']);
    }

    public function show_parent_categories_tree(Request $request){
        $id_cat=$request->input('id_cat');
        $data=$this->recursive_cat_names($name='',$id_cat);
        return json_encode($data);
    }

    public function add_category_form(Request $request){



        $data=[
            'parent_id' => $request->input('parent_id'),
            'name' => $request->input('name'),
            'icon'=> 'fa-envelope',
            'icon_hover'=> 'fa-envelope',
            'link'=> '/'.$request->input('link')
        ];

        DB::table('categories')->insert($data);
        return redirect('/superadmin/categories/add');
    }


    public function if_link_exist(Request $request){

        if(count($data['category']=DB::table('product_categories')->where('link','/'.$request->input('link'))->get())>=1){
            return json_encode(1);
        }
        else{
            return json_encode(null);
        }

    }

}
