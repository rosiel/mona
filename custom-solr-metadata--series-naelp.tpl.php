<?php
/**
 * @file islandora-solr-grid.tpl.php
 * Islandora solr primary results template file for
 *
 * Variables available:
 * - $variables: all array elements of $variables can be used as a variable. e.g. $base_url equals $variables['base_url']
 * - $base_url: The base url of the current website. eg: http://example.com/drupal .
 * - $user: The user object.
 * - $solr_default_img: default solr image. Used when no thumbnail is available.
 *
 * - $results: Primary profile results array
 *
 * @see template_preprocess_islandora_solr()
 */
?>

<?php if (empty($results)): ?>
  <p class="no-results"><?php print t('Sorry, but your search returned no results.'); ?></p>
<?php else: ?>
  <div class="islandora islandora-solr-search-results">
    <?php $row_result = 0; ?>
    <?php foreach($results as $result): ?>
    <!-- Search result -->
    <div class="islandora-solr-search-result clear-block <?php print $row_result % 2 == 0 ? 'odd' : 'even'; ?>">
      <!-- PID --> 
      <?php $PID = $result['PID'];?>
      <!-- Thumbnail -->
      <dl class="solr-thumb">
        <dt>
          <?php $image = '<img src="' . $result['thumbnail_url'] . '" />'; ?>
          <?php print l($image, $result['object_url'] , array('html' => TRUE)); ?>
        </dt>
        <dd></dd>
      </dl>
      <!-- Metadata -->
      <div class="solr-fields islandora-inline-metadata">
        <?php $row_field = 0; ?>
        <?php $max_rows = count($results[$row_result]) - 1; ?>

        <?php foreach($result['solr_doc'] as $key => $value): ?>
	  <?php if ($key == 'title' or $key == 'more'): ?>
            <?php $value['value'] = l($value['value'], $result['object_url'], array('html' => TRUE)); ?>
	  <?php endif; ?>
      <?php if ($key == 'volume') continue; ?>
          <div class="solr-value <?php print $value['class']; ?><?php print $row_field == 0 ? ' first' : ''; ?><?php print $row_field == $max_rows ? ' last' : ''; ?>">
            <?php print $value['label'] . ' ' . $value['value']; ?>
          </div>
          <?php $row_field++; ?>
        <?php endforeach; ?>
      </div>
    </div>
    <?php $row_result++; ?>
    <?php endforeach; ?>
  </div>
<?php endif; ?>


