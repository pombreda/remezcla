<?php
/**
 * @file
 * The PHP page that serves all page requests on a remezcla installation.
 *
 * Dispatch control to the appropriate handler, which then
 * prints the appropriate page.
 *
 * All remezcla code is released under the GNU General Public License.
 * See COPYRIGHT.txt and LICENSE.txt.
 */
#Hewlett-Packard, Asus, Acer, MSI, Dell

include('./inc/bootstrap.php');
# include enabled modules and populate path map
# TODO remove MODULE enabling from config and automatically include modules with a modulename.ini file
$site['boxes'] = array();
foreach ($config['MODULES'] as $module => $status) {
  if ($status) {
    include PATH_MODULES . $module . DIRECTORY_SEPARATOR . 'class.' . $module . '.php';
    $class_name = ucfirst($module);
    # TODO passing the complete config array here sucks
    $object = new $class_name($config);
    $site['boxes'][] = $object->itemList();
  }
}

$html = '';
if ($items) {
  $html .= '<ul>';
  $tpl = '<li><a href="%s">%s</a></li>';
  foreach ($items['items'] as $item) {
    $html .= sprintf($tpl, $item['url'], $item['title']);
  }
  $html .= '</ul>';
}
else {
  $html .= '<p>No results</p>';
}

if (isset($_GET['js'])) {
  header('Content-type: text/javascript');
  print $html;
}
else {
  header('Content-type: text/html');
  $site['content'] = $html;
  
  // load the template
  require $path_template . 'layout.tpl.php';
}
