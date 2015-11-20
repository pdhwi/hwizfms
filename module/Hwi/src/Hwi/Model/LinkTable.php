<?php 
namespace Hwi\Model;

 use Zend\Db\TableGateway\TableGateway;

 class LinkTable
 {
     protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }

     public function fetchAll($where='',$order='',$limit='')
     {

            $resultSet = $this->tableGateway->select($where,$order,$limit);

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
                'product_id'      => $this->product_id,
                'product_name'    => $this->product_name,
                'product_proCat'  => $this->product_proCat,
                'product_feature' => $this->product_feature,
                'product_desc'    => $this->product_desc,
                'product_PCimg'   => $this->product_PCimg,
                'product_MBimg'   => $this->product_MBimg,
                'product_price'   => $this->product_price,
                'product_orderBy' => $this->product_orderBy,
                'product_show'    => $this->product_show,
                'product_addtime' => $this->product_addtime,
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