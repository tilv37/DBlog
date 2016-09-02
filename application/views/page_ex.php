<?php
foreach($articles as $item)
{
    echo $item['title'];
}

echo $this->pagination->create_links();
