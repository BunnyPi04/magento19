<?php
class Pfay_Films_Block_Adminhtml_Grid extends Mage_Adminhtml_Block_Widget_Grid_Container
{

    public function __construct()
    {
        //indicate where we can find the controller
        $this->_controller = 'adminhtml_films';
        $this->_blockGroup = 'pfay_films';
        parent::__construct();
        //header text

        $this->_headerText = Mage::helper('pfay_films')->__('ádasd');
        //button label
        $this->_addButtonLabel = 'Add a movie';
//        $this->addButton('filter_form_submit',
//            array(
//                'label'     => Mage::helper('reports')->__('Show Report'),
//            ));
//        $this->setSaveParametersInSession(true);

     }


//    public function __construct()
//    {
//
//        parent::__construct();
//        $this->setId('filmsGrid');
//        $this->setDefaultSort('id_pfay_films');
//        $this->setDefaultDir('DESC');
//        $this->setSaveParametersInSession(true);
//
//    }
//
//    protected function _prepareCollection()
//    {
//        $collection = Mage::getModel('pfay_films/film')->getCollection();
//        $this->setCollection($collection);
//        return parent::_prepareCollection();
//    }
//
//    protected function _prepareColumns()
//    {
//        $this->addColumn('id_pfay_films',
//            array(
//                'header' => 'ID',
//                'align' =>'right',
//                'width' => '50px',
//                'index' => 'id_pfay_films',
//            ));
//
//        $this->addColumn('name',
//            array(
//                'header' => 'name',
//                'align' =>'left',
//                'index' => 'name',
//            ));
//
//        return parent::_prepareColumns();
//    }
//
//    public function getRowUrl($row)
//    {
//        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
//    }
}
?>