<?php

namespace Trandinhvi39\Fauth\Contracts;

interface User
{
    /**
     * Get the unique identifier for the user.
     *
     * @return string
     */
    public function getId();

    /**
     * Get the employee code for the user.
     *
     * @return string
     */
    public function getEmployeeCode();

    /**
     * Get the name of the user.
     *
     * @return string
     */
    public function getName();

    /**
     * Get the e-mail address of the user.
     *
     * @return string
     */
    public function getEmail();

    /**
     * Get the company of the user
     *
     * @return string
     */
    public function getCompany();

    /**
     * Get the contract date of the user.
     *
     * @return string
     */
    public function getContractDate();

    /**
     * Get the staff type of the user.
     *
     * @return string
     */
    public function getStaffType();
    
    /**
     * Get the workspace of the user.
     *
     * @return string
     */
    public function getWorkpace();

    /**
     * Get the group of the user.
     *
     * @return string
     */
    public function getGroup();

    /**
     * Get the gender of the user.
     *
     * @return string
     */
    public function getGender();

    /**
     * Get the birthday of the user.
     *
     * @return string
     */
    public function getBirthday();

    /**
     * Get the avatar / image URL for the user.
     *
     * @return string
     */
    public function getAvatar();
}
