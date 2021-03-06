<?php // src/AppBundle/DataFixtures/ORM/LoadTestData.php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Subspace\CustomerBundle\Entity\Space;
use Subspace\CustomerBundle\Entity\Message;
use Subspace\CustomerBundle\Entity\Address;

class LoadTestData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // Load Addresses Data
        
        // Parse the Spaces test data file into an array
        $AddressesCsv = array_map('str_getcsv', file(__DIR__.'/Addresses.csv'));
        // Remove initial array item as it is just the row names
        unset($AddressesCsv[0]);
        // Define an Address ID Array
        $AddressIdArray = array();
        // Loop through the rows and add them to the database
        foreach ($AddressesCsv as $row => $row_array)
        {          
            $Address = new Address();
            $Address->setHouseNumber($row_array[0]);
            $Address->setAddressLine1($row_array[1]);
            $Address->setAddressLine2($row_array[2]);
            $Address->setAddressLine3($row_array[3]);
            $Address->setCity($row_array[4]);
            $Address->setPostcode($row_array[5]);
            $Address->setCountryId($row_array[6]);
            $manager->persist($Address);
            $manager->flush();

            array_push($AddressIdArray, $Address->getId());
        }
        
        // Load Spaces Data
        
        // Parse the Spaces test data file into an array
        $SpacesCsv = array_map('str_getcsv', file(__DIR__.'/Spaces.csv'));
        // Remove initial array item as it is just the row names
        unset($SpacesCsv[0]);
        // Loop through the rows and add them to the database
        foreach ($SpacesCsv as $row => $row_array)
        {
            $Space = new Space();
            $Space->setName($row_array[0]);
            $Space->setDescription($row_array[1]);
            $Space->setAddressId(array_pop ( $AddressIdArray ));
            $manager->persist($Space);
            $manager->flush();
        }

        // Load Messages Data
        
        // Parse the Spaces test data file into an array
        $MessagesCsv = array_map('str_getcsv', file(__DIR__.'/Messages.csv'));
        // Remove initial array item as it is just the row names
        unset($MessagesCsv[0]);
        // Loop through the rows and add them to the database
        foreach ($MessagesCsv as $row => $row_array)
        {
            $TimeReceived = new \DateTime($row_array[4]);
            $TimeRead = new \DateTime($row_array[6]);
            
            $Message = new Message();
            $Message->setSubject($row_array[0]);
            $Message->setBody($row_array[1]);
            $Message->setFromId($row_array[2]);
            $Message->setSentToId($row_array[3]);
            $Message->setTimeReceived($TimeReceived);
            $Message->setStatus($row_array[5]);
            $Message->setTimeRead($TimeRead);
            $manager->persist($Message);
            $manager->flush();
        }

        
    }
}

?>