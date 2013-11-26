<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Baby_record_lib {

    private $id;
    private $name;
    private $dob;
    private $oob;
    private $delivered_at;
    private $mode_of_delivery;
    private $done_by_dr;
    private $birth_weight;
    private $head_circumference;
    private $length;
    private $blood_group;
    private $mothers_name;
    private $mothers_blood_group;
    private $mothers_occupation;
    private $fathers_name;
    private $fathers_blood_group;
    private $fathers_occupation;
    private $home_address;
    private $telephone_no;
    private $status;
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getDob() {
        return $this->dob;
    }

    public function setDob($dob) {
        $this->dob = $dob;
    }

    public function getOob() {
        return $this->oob;
    }

    public function setOob($oob) {
        $this->oob = $oob;
    }

    public function getDelivered_at() {
        return $this->delivered_at;
    }

    public function setDelivered_at($delivered_at) {
        $this->delivered_at = $delivered_at;
    }

    public function getMode_of_delivery() {
        return $this->mode_of_delivery;
    }

    public function setMode_of_delivery($mode_of_delivery) {
        $this->mode_of_delivery = $mode_of_delivery;
    }

    public function getDone_by_dr() {
        return $this->done_by_dr;
    }

    public function setDone_by_dr($done_by_dr) {
        $this->done_by_dr = $done_by_dr;
    }

    public function getBirth_weight() {
        return $this->birth_weight;
    }

    public function setBirth_weight($birth_weight) {
        $this->birth_weight = $birth_weight;
    }

    public function getHead_circumference() {
        return $this->head_circumference;
    }

    public function setHead_circumference($head_circumference) {
        $this->head_circumference = $head_circumference;
    }

    public function getLength() {
        return $this->length;
    }

    public function setLength($length) {
        $this->length = $length;
    }

    public function getBlood_group() {
        return $this->blood_group;
    }

    public function setBlood_group($blood_group) {
        $this->blood_group = $blood_group;
    }

    public function getMothers_name() {
        return $this->mothers_name;
    }

    public function setMothers_name($mothers_name) {
        $this->mothers_name = $mothers_name;
    }

    public function getMothers_blood_group() {
        return $this->mothers_blood_group;
    }

    public function setMothers_blood_group($mothers_blood_group) {
        $this->mothers_blood_group = $mothers_blood_group;
    }

    public function getMothers_occupation() {
        return $this->mothers_occupation;
    }

    public function setMothers_occupation($mothers_occupation) {
        $this->mothers_occupation = $mothers_occupation;
    }

    public function getFathers_name() {
        return $this->fathers_name;
    }

    public function setFathers_name($fathers_name) {
        $this->fathers_name = $fathers_name;
    }

    public function getFathers_blood_group() {
        return $this->fathers_blood_group;
    }

    public function setFathers_blood_group($fathers_blood_group) {
        $this->fathers_blood_group = $fathers_blood_group;
    }

    public function getFathers_occupation() {
        return $this->fathers_occupation;
    }

    public function setFathers_occupation($fathers_occupation) {
        $this->fathers_occupation = $fathers_occupation;
    }

    public function getHome_address() {
        return $this->home_address;
    }

    public function setHome_address($home_address) {
        $this->home_address = $home_address;
    }

    public function getTelephone_no() {
        return $this->telephone_no;
    }

    public function setTelephone_no($telephone_no) {
        $this->telephone_no = $telephone_no;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

}