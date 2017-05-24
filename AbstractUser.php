<?php

namespace Trandinhvi39\Fauth;

use ArrayAccess;

abstract class AbstractUser implements ArrayAccess, Contracts\User
{
    /**
     * The unique identifier for the user.
     *
     * @var mixed
     */
    public $id;

    /**
     * The user's employee code.
     *
     * @var string
     */
    public $employeeCode;

    /**
     * The user's name.
     *
     * @var string
     */
    public $name;

    /**
     * The user's e-mail address.
     *
     * @var string
     */
    public $email;

    /**
     * The user's company.
     *
     * @var array
     */
    public $company;

    /**
     * The user's contract date.
     *
     * @var array
     */
    public $contractDate;

    /**
     * The user's staff type.
     *
     * @var array
     */
    public $staffType;

    /**
     * The user's workspace.
     *
     * @var array
     */
    public $workspace;

    /**
     * The user's group.
     *
     * @var string
     */
    public $group;

    /**
     * The user's gender.
     *
     * @var string
     */
    public $gender;

    /**
     * The user's birthday.
     *
     * @var string
     */
    public $birthday;

    /**
     * Get the unique identifier for the user.
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the employee code for the user.
     *
     * @return string
     */
    public function getEmployeeCode()
    {
        return $this->employeeCode;
    }

    /**
     * Get the full name of the user.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the e-mail address of the user.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the company of the user
     *
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Get the contract date of the user.
     *
     * @return string
     */
    public function getContractDate()
    {
        return $this->contractDate;
    }

    /**
     * Get the staff type of the user.
     *
     * @return string
     */
    public function getStaffType()
    {
        return $this->staffType;
    }
    
    /**
     * Get the workspace of the user.
     *
     * @return string
     */
    public function getWorkpace()
    {
        return $this->workspace;
    }

    /**
     * Get the group of the user.
     *
     * @return string
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Get the gender of the user.
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Get the birthday of the user.
     *
     * @return string
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Get the avatar / image URL for the user.
     *
     * @return string
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Get the raw user array.
     *
     * @return array
     */
    public function getRaw()
    {
        return $this->user;
    }

    /**
     * Set the raw user array from the provider.
     *
     * @param  array  $user
     * @return $this
     */
    public function setRaw(array $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Map the given array onto the user's properties.
     *
     * @param  array  $attributes
     * @return $this
     */
    public function map(array $attributes)
    {
        foreach ($attributes as $key => $value) {
            $this->{$key} = $value;
        }

        return $this;
    }

    /**
     * Determine if the given raw user attribute exists.
     *
     * @param  string  $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->user);
    }

    /**
     * Get the given key from the raw user.
     *
     * @param  string  $offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return $this->user[$offset];
    }

    /**
     * Set the given attribute on the raw user array.
     *
     * @param  string  $offset
     * @param  mixed  $value
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        $this->user[$offset] = $value;
    }

    /**
     * Unset the given value from the raw user array.
     *
     * @param  string  $offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->user[$offset]);
    }
}
