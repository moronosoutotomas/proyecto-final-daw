<?php

test('A páxina principal pode renderizarse', function () {
    $response = $this->get('/homepage');
    $response->assertOk();
});
