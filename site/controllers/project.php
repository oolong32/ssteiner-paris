<?php
return function ($site, $page) {
  // data for the template
  return array(
    'startDate' => $page->startdate()->toDate('d.m.Y'),
    'endDate'   => $page->enddate()->toDate('d.m.Y'),
    'images'    => $page->files()->filterBy('type', 'image'),
    'altText'   => $site->title() . ', ' . $page->title(),
    'files'     => $page->files()->filterBy('type', 'document'),
  );
};