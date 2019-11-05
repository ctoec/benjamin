<?php
/**
 * Form for subscribing to news
 */
$terms = get_terms('news-category');
?>

<h1 class="text-violet-70v font-sans-xl text-normal margin-top-10">Sign Up for News &amp; Updates</h1>
<div class="font-sans-md text-normal line-height-sans-4 margin-top-0 margin-bottom-5">Want to receive email updates from OEC? Choose the topics you're interested in and we'll send you updates.</div>
<form>
    <?php 
        $count = 0;
        foreach($terms as $term) 
    { ?>
        <div class="grid-row padding-bottom-3 <?php if ($count != count($terms) - 1) { ?> margin-bottom-3 border-bottom border-base-lighter<?php } ?>">
            <div class="flex-auto margin-right-2">
                <div class="usa-checkbox">
                    <input class="usa-checkbox__input" id="option-<?php echo $term->term_id ?>" type="checkbox" name="option-<?php echo $term->term_id ?>" checked>
                    <div class="usa-checkbox__label"></div>
                </div>
            </div>
            <label for="option-<?php echo $term->term_id ?>" class="flex-fill">
                <div class="font-sans-md text-bold"><?php echo $term->name; ?></div>
                <?php
                    $term_children = get_term_children($term->term_id, 'news-category');
                    $children = [];
                    
                    foreach($term_children as $child) {
                        $children[] = get_term_by('id', $child, 'news-category')->name;
                    }
                ?>
                <?php if ($children) { ?>
                    <div>
                        <strong>Includes information on:</strong> 
                        <?php echo implode(', ', $children); ?>
                    </div>
                <?php } ?>
            </label>
        </div>
        <?php $count++; ?>
    <?php } ?>
    <div class="grid-row flex-align-end margin-bottom-6">
        <div class="flex-1 margin-right-1">
            <label class="usa-label" for="email">Email Address</label>
            <input class="usa-input" id="email" name="email" type="email" />
        </div>
        <div class="flex-1">
            <button class="usa-button ">Subscribe</button>
        </div>
    </div>
</form>