<?php

return function ($site) {
    return $site->children()->filterBy('template', 'workshop');
};