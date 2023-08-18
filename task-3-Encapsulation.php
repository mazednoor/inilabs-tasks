<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Employee Data (Encapsulation)</title>
</head>
<body style="font-size: 25px">
    <?php
        // Class for managing Employee Data
        class edata {
            private $eid;
            private $esalaray;

            // method to set Employee ID
            public function setEid ( $eid ) {
                $this->eid = $eid;
            }

            // method to get Employee ID
            public function getEid() {
                return $this->eid;
            }

            // method to set Employee Salary
            public function setEsalary( $esalaray ) {
                $this->esalary = $esalaray;
            }

            // method to get Employee Salary
            public function getEsalary( ) {
                return $this->esalary;
            }
        }

        $data = new edata();

        // Setting the Employee ID and Salary
        $data->setEid(101);
        $data->setEsalary(100000);
        
        // Printing the Employee ID and Salary
        echo "The salary of the employee ID <b>" . $data->getEid() . "</b> is <b>" . $data->getEsalary(). "</b>";
    ?>
</body>
</html>