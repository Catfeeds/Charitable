<?php

/**
 * 管理员
 *
 * @author: moxiaobai
 * @since : 2016/1/29 10:36
 */

class CashsModel extends BaseModel {

    public function __construct()
    {
        parent::__construct('charity', 't_cashs', 'ca_id');
    }


    /**
     * 获取列表
     *
     * @param array $where
     * @param array $pagination
     * @return bool
     */
    public function getList($where=array(), $pagination=array()) {
        $data = $this->_setWhereSQL($where)
                    ->_setPaginationSQL($pagination)
                    ->_db->select('*')
                    ->from($this->_table)
                    ->order($this->_primary_key, 'DESC')
                    ->fetchAll();

        if ( $data === FALSE ) return FALSE;
        return $data;
    }

    /**
     * 统计数量
     *
     * @param array $where
     */
    public function countData($where=array()) {
        return $this->_setWhereSQL($where)->_db->select('COUNT(*)')->from($this->_table)->fetchValue();
    }


    /**
     * @param $id
     */
    public function getInfo($id) {
        return $this->_db->select('*')->from($this->_table)->where($this->_primary_key, $id)->fetchOne();
    }

    public function getData($where){
        return $this->_setWhereSQL($where)->_db->select('*')->from($this->_table)->fetchOne();
    }


    /**
     * 保存数据
     *
     * @param array $data
     * @param int   $id
     * @return mixed
     */
    public function saveData($data, $id=0) {
        if($id > 0){
            return $this->_db->update($this->_table)->rows($data)->where($this->_primary_key, $id)->execute();
        }else{
            return $this->_db->insert($this->_table)->rows($data)->execute();
        }
    }


    /**
     * 改变状态
     *
     * @param $id
     * @param array $data 修改数据
     * @return mixed
     */
    public function changeData($id, $data) {
        return $this->_db->update($this->_table)->rows($data)->where($this->_primary_key, $id)->execute();
    }


    /**
     * SQL分页查询
     */
    private function _setPaginationSQL( $pagination = array() ) {
        if ( isset($pagination['page']) AND isset($pagination['pagesize']) ) {
            $page      = isset( $pagination['page'] ) ? intval($pagination['page']) : 1;
            $pagesize  = isset( $pagination['pagesize']  ) ? intval($pagination['pagesize'])  : 10;
            $this->_db->page($page, $pagesize);
        } elseif ( isset($pagination['limit']) ) {
            $this->_db->limit( intval($pagination['limit']) );
        }
        return $this;
    }

    /**
     * SQL Where条件
     * @param array $where
     * @return $this
     */
    private function _setWhereSQL ($where = array()) {
        if (isset($where['ca_type']) && $where['ca_type']) {
            $this->_db->where("ca_type", $where['ca_type']);
        }

        if (isset($where['ca_mid']) && $where['ca_mid']) {
            $this->_db->where("ca_mid", $where['ca_mid']);
        }

        if (isset($where['d_id']) && $where['d_id']) {
            $this->_db->where("d_id", $where['d_id']);
        }

        return $this;
    }

}