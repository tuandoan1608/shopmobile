<?php
namespace App\Component;
class recusive{
    private $data;
    private $htmlseled='';
    public function __construct($data)
    {
        $this->data=$data;
    }

    public function categoryRecure($parentID,$id=0,$text='')
    {
       foreach($this->data as $value){
          if($value['parentID']==$id){
            if(!empty($parentID)&& $parentID ==$value['id']){
                $this->htmlseled .="<option selected value='"  . $value['id'] .  "'>" . $text . $value['name'] . "</option>";
            }else{
                $this->htmlseled .= "<option value='"  . $value['id'] .  "'>" . $text . $value['name'] . "</option>";

                $this->categoryRecure($parentID,$value['id'], $text . '--');
            }
          }
       }
       return $this->htmlseled;
    }
}
?>