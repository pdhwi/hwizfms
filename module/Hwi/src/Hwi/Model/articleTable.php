<?php 
namespace Hwi\Model;

 use Zend\Db\TableGateway\TableGateway;

 class articleTable
 {
     protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }

     public function fetchAll($where='',$order='',$limit='',$paginated='')
     {
        
        if($paginated){

            $select = new \Zend\Db\Sql\Select('hwi_article');
            if(is_array($where)){
                $select->where($where);
            }
            if(is_array($order)){
            foreach ($order as $key => $value) {
                   $select->order($value);    
               }
            }
            $rs = new \Zend\Db\ResultSet\ResultSet();

            $rs->setArrayObjectPrototype(new article());

            $pageAdapter = new \Zend\Paginator\Adapter\DbSelect($select,$this->tableGateway->getAdapter(),$rs);

            $paginator = new \Zend\Paginator\Paginator($pageAdapter);
            
            return $paginator;

        }

        $resultSet = $this->tableGateway->select($where,$order,$limit);
        
        return $resultSet;
     }

     public function getarticle($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('article_id' => $id));
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

     function pag($where,$order,$limit){
        
        $select =$this->sql->$select();
        $DbSelect = new DbSelect($select,$this->Adapter,$this->resultSetPrototype);
        return new Paginator($DbSelect);
     }
 }
?>