<div class="col-sm-6">
    डाटा <strong>{{getUnicodeNumber($data['rows']->firstItem()) }}</strong> देखि <strong>{{getUnicodeNumber($data['rows']->lastItem()) }} </strong> को <strong> {{getUnicodeNumber($data['rows']->total())}}</strong> प्रविष्टिहरू
    <span> | पृष्ठ {{ getUnicodeNumber(round((microtime(true) - LARAVEL_START),2) ) }} सेकेन्डमा रेन्डर गरियो। </span>
</div>