<?php
return function ($site, $page) {
  // data for the template
  return array(
    'images'    => $page->files()->filterBy('template', 'projectimages')->sortBy('sort'),
    'defaultAlt'   => $site->title() . ', ' . $page->title(),
    'documents'     => $page->files()->filterBy('type', 'document')->sortBy('sort'),
  );
};