
<div>
  <?php foreach($series_docs as $key => $doc): ?>
    <?php $series_docs[$key]['weight'] = $doc['date']; ?>
  <?php endforeach; ?>
  <?php uasort($series_docs, 'drupal_sort_weight'); ?>
  <?php $series_docs = array_reverse($series_docs); ?>

  <?php foreach($series_docs as $doc): ?>
    <div class="islandora-series-object islandora-series-list-item clearfix">
      <dl>
      <dt>
        <?php if(isset($doc['thumb_link'])): ?>
	      <?php print($doc['thumb_link']); ?>
    	<?php endif; ?>
	  </dt>

	  <dd class="collection-value volume">
      <?php print($doc['volume'] ? t('Volume ') . $doc['volume'] : NULL); ?>
	  </dd>

      <dd class="collection-value title">
      <?php $title = ''; ?>
      <?php if(isset($doc['title'])): ?>
        <?php $title .= $doc['title']; ?>
      <?php endif; ?>
	  <?php if (isset($doc['subtitle'])): ?>
        <?php $title .= ': ' . $doc['subtitle']; ?>
      <?php endif; ?>
      <?php if (isset($doc['partname'])): ?>
		<?php $title .= ' - ' . $doc['partname']; ?>
      <?php endif; ?>
	  <?php print(l($title, $doc['object_url'], array('html' => TRUE, 'attributes' => array('title' => $title)))); ?>
      </dd>

      <?php if(isset($doc['description'])): ?>
        <dd class="collection-value details">
	    <?php print($doc['description']); ?>
        </dd>
      <?php endif; ?>
      <?php if(isset($doc['date'])): ?>
        <dd class="collection-value date">
	    <?php print("Published: " . $doc['date']); ?>
        </dd>
      <?php endif; ?>
        <!--
	 <?php dprint_r($doc); ?> 
	-->
      </dd>
      </dl>
    </div>
  <?php endforeach; ?>
</div>

