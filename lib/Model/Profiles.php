<?php
namespace lib\Model;

class Profiles extends \lib\Model{
	
	public function createProfile($values){
		$stmt=$this->db->prepare("insert into profiles(id, name, department, professional, message, created, modified) values (:id, :name, :department, :professional, :message, now(), now())");
		$stmt->execute([
			':id'=>$values['id'],
			':name'=>'',
			':department'=>'',
			':professional'=>'',
			':message'=>''
		]);
	}

	public function profile($values){
		$stmt=$this->db->prepare("select * from profiles where id=:id");
		$stmt->execute([
			':id'=>$values['id']
		]);
		$stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
		$profile=$stmt->fetchAll();
		return $profile;
	}
	
	public function update($values){
		$stmt=$this->db->prepare("update profiles set name=:name, department=:department, professional=:professional, message=:message, modified=now() where id=:id");
		$stmt->execute([
			':id'=>$values['id'],
			':name'=>$values['name'],
			':department'=>$values['department'],
			':professional'=>$values['professional'],
			':message'=>$values['message']
		]);
	}
	
}