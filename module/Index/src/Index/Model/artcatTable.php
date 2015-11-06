<?php 
namespace Index\Model;

 use Zend\Db\TableGateway\TableGateway;

 class artcatTable
 {
     protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }

     public function fetchAll($where='',$order='')
     {

        if($where){
             $resultSet = $this->tableGateway->select($where,$order);
        }else{
           $resultSet = $this->tableGateway->select('',$order); 
        }
      
         return $resultSet;
     }

     public function getartCat($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('artCat_id' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }

     public function saveBanner(Banner $album)
     {
         $data = array(
                'banner_id'      => $this->banner_id,
                'banner_title'   => $this->banner_title,
                'banner_url'     => $this->banner_url,
                'banner_image'   => $this->banner_image,
                'banner_show'    => $this->banner_show,
                'banner_orderBy' => $this->banner_orderBy,
         );

         $id = (int) $album->id;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getAlbum($id)) {
                 $this->tableGateway->update($data, array('banner_id' => $id));
             } else {
                 throw new \Exception('Banner id does not exist');
             }
         }
     }

     public function deleteBanner($id)
     {
         $this->tableGateway->delete(array('banner_id' => (int) $id));
     }

     function checksql(){
         return $this->tableGateway->getLastInsertValue();
     }
 }
?>