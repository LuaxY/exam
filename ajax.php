<?php

switch(@$_GET['q'])
{
    case 'classes':
        $data = classes();
        break;
    case 'students':
        $data = students(@$_GET['c']);
        break;
    default:
        $data = json_encode(array("error" => "invalid request"));
        break;
}

echo $data;

function classes()
{
    return json_encode(
        array(
            "Bachelor 1",
            "Bachelor 2",
            "Bachelor 3",
            "Expert 1",
            "Expert 2",
        )
    );
}

function students($classes = null)
{
    return json_encode(
        array(
            array(
                "firstname" => "Yann",
                "lastname" => "Guineau",
            ),
            array(
                "firstname" => "Test",
                "lastname" => "123",
            ),
        )
    );
}
