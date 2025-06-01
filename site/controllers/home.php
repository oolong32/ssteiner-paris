<?php
return function ($site, $page) {
  // data for the template
  return array(
    'projects'   => page('projects')->children()->listed()->flip(),
  );
};