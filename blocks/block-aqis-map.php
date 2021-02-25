<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<style>
.ct-map {
    position: relative;
    margin: 3rem auto 0;
    width: 100%;
}

.ct-map-container {
  margin-bottom: 4rem;
}

.tooltip {
  position: absolute;
  z-index: 1070;
  display: block;
  font-family: -apple-system, system-ui, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
  font-style: normal;
  font-weight: normal;
  letter-spacing: normal;
  line-break: auto;
  line-height: 1.5;
  text-align: left;
  text-align: start;
  text-decoration: none;
  text-shadow: none;
  text-transform: none;
  white-space: normal;
  word-break: normal;
  word-spacing: normal;
  font-size: 0.875rem;
  word-wrap: break-word;
  opacity: 0;
}

.tooltip.show {
  opacity: 0.9;
}

.tooltip.bs-tooltip-top {
  margin-bottom: -65px;
}

.tooltip.tooltip-top, .tooltip.bs-tether-element-attached-bottom {
  padding: 5px 0;
  margin-top: -3px;
}

.tooltip.tooltip-top .tooltip-inner::before, .tooltip.bs-tether-element-attached-bottom .tooltip-inner::before {
  bottom: 0;
  left: 50%;
  margin-left: -5px;
  content: "";
  border-width: 5px 5px 0;
  border-top-color: #000;
}

.tooltip.tooltip-right, .tooltip.bs-tether-element-attached-left {
  padding: 0 5px;
  margin-left: 3px;
}

.tooltip.tooltip-right .tooltip-inner::before, .tooltip.bs-tether-element-attached-left .tooltip-inner::before {
  top: 50%;
  left: 0;
  margin-top: -5px;
  content: "";
  border-width: 5px 5px 5px 0;
  border-right-color: #000;
}

.tooltip.tooltip-bottom, .tooltip.bs-tether-element-attached-top {
  padding: 5px 0;
  margin-top: 3px;
}

.tooltip.tooltip-bottom .tooltip-inner::before, .tooltip.bs-tether-element-attached-top .tooltip-inner::before {
  top: 0;
  left: 50%;
  margin-left: -5px;
  content: "";
  border-width: 0 5px 5px;
  border-bottom-color: #000;
}

.tooltip.tooltip-left, .tooltip.bs-tether-element-attached-right {
  padding: 0 5px;
  margin-left: -3px;
}

.tooltip.tooltip-left .tooltip-inner::before, .tooltip.bs-tether-element-attached-right .tooltip-inner::before {
  top: 50%;
  right: 0;
  margin-top: -5px;
  content: "";
  border-width: 5px 0 5px 5px;
  border-left-color: #000;
}

.tooltip-inner {
  max-width: 200px;
  padding: 3px 8px;
  color: #fff;
  text-align: center;
  background-color: #000;
  border-radius: 0.25rem;
}

.tooltip-inner::before {
  position: absolute;
  width: 0;
  height: 0;
  border-color: transparent;
  border-style: solid;
}

/* Town select */

html body .select2-container {
    display: block;
    margin: 0 0 2rem;
    width: 100% !important;
    max-width: 30rem;
}

html body .select2-container .select2-selection--single,
html body .select2-container .select2-selection--single:hover,
html body .select2-container .select2-selection--single:active,
html body .select2-container .select2-selection--single:focus {
    background-color: #fff;
    border: 2px solid #dfdfdf;
    border-radius: .25rem;
    height: 3rem;
    display: flex;
    align-items: center;
    padding: 0 .5rem;
    border-color: #dfdfdf !important;
}

html body .select2-container .select2-selection--single .select2-selection__rendered {
    color: #606060;
}

html body .select2-container .select2-selection--single .select2-selection__arrow {
    height: 100%;
    position: relative;
    top: 0;
    right: 0;
    width: 2rem;
    margin-left: auto;
}

html body .select2-container .select2-search--dropdown .select2-search__field {
    padding: .75rem;
    border: 1px solid #6098af;
    outline: none;
}

html body .select2-container .select2-results__option--disabled {
    padding-left: 1rem;
}

html body .select2-container .select2-results__group {
    padding: 6px 1rem;
}

html body .select2-container .select2-results__option .select2-results__option {
    padding-left: 2.5rem;
}

html body .select2-container .select2-results__option .select2-results__option--highlighted {
    background-color: #6098af;
}

html body .select2-container .select2-results {
  width: 100%;
}

html body .select2-container .select2-results > .select2-results__options {
    max-height: 30rem;
    width: 100%;
}

.ct-map [data-town] {
    fill: #dfdfdf;
    transition: all .1s ease;
}

.ct-map [data-town]:hover {
    opacity: .7;
    fill: #ffffff;
    cursor: pointer;
}

.ct-map [data-town].active {
    opacity: 7;
    fill: #ffffff;
    cursor: pointer;
}

/* Map colors */

.ct-map [data-town].eastern,
.ct-map [data-town].eastern:hover,
.ct-map legend .swatch.eastern {
    fill: #6c8acf;
    background-color: #6c8acf;
}

.ct-map [data-town].north-central,
.ct-map [data-town].north-central:hover,
.ct-map legend .swatch.north-central {
    fill: #c3ba57;
    background-color: #c3ba57;
}

.ct-map [data-town].northwest,
.ct-map [data-town].northwest:hover,
.ct-map legend .swatch.northwest {
    fill: #62bdce;
    background-color: #62bdce;
}

.ct-map [data-town].south-central,
.ct-map [data-town].south-central:hover,
.ct-map legend .swatch.south-central {
    fill: #62ce98;
    background-color: #62ce98;
}

.ct-map [data-town].southwest,
.ct-map [data-town].southwest:hover,
.ct-map legend .swatch.southwest {
    fill: #ce62ca;
    background-color: #ce62ca;
}

.ct-map [data-town].northeast,
.ct-map [data-town].northeast:hover,
.ct-map legend .swatch.northeast {
    fill: #f2a07b;
    background-color: #f2a07b;
}

.ct-map [data-town].southeast,
.ct-map [data-town].southeast:hover,
.ct-map legend .swatch.southeast {
    fill: #80a378;
    background-color: #80a378;
}

.ct-map [data-town].active {
    fill: #61366e !important;
    background-color: #61366e !important;
}

/* Map legend */

.ct-map legend {
  font-size: 1rem;
  width: 100%;
  margin-top: 2rem;
}

.ct-map legend .swatch {
    display: inline-block; 
    width: 1rem;
    height: 1rem;
    margin-right: .5rem;
}

/* Networks */

.data-div {
    display: grid;
    grid-gap: 1rem;
    grid-template-columns: repeat(1, 1fr);
}

@media screen and (min-width: 768px) {
    .data-div {
        grid-template-columns: repeat(2, 1fr);
    }   
}

.data-div .title {
  margin: 1rem 0 0 0;
  grid-column: 1 / -1;
  color: #000;
  font-size: 1.5rem;
  font-weight: bold;
}

.network {
    padding: 2rem;
    border: 2px solid #dfdfdf;
}

.network h3 {
    margin-top: 0;
    margin-bottom: .5em;
}

.network .address {
    margin-top: 1rem;
}

.network .contacttwo {
    margin-top: 1rem;
}
</style>

<div class="ct-map-container">
  <div class="ct-map">
    <select class="map-select">
      <option selected="" disabled="">Select a town or click on the map below...</option>
      <option value="Andover">Andover</option>
      <option value="Ansonia">Ansonia</option>
      <option value="Ashford">Ashford</option>
      <option value="Avon">Avon</option>
      <option value="Barkhamsted">Barkhamsted</option>
      <option value="Beacon Falls">Beacon Falls</option>
      <option value="Berlin">Berlin</option>
      <option value="Bethany">Bethany</option>
      <option value="Bethel">Bethel</option>
      <option value="Bethlehem ">Bethlehem </option>
      <option value="Bloomfield">Bloomfield</option>
      <option value="Bolton">Bolton</option>
      <option value="Bozrah">Bozrah</option>
      <option value="Branford">Branford</option>
      <option value="Bridgeport">Bridgeport</option>
      <option value="Bridgewater">Bridgewater</option>
      <option value="Bristol">Bristol</option>
      <option value="Brookfield">Brookfield</option>
      <option value="Brooklyn">Brooklyn</option>
      <option value="Burlington">Burlington</option>
      <option value="Canaan">Canaan</option>
      <option value="Canterbury">Canterbury</option>
      <option value="Canton">Canton</option>
      <option value="Chaplin">Chaplin</option>
      <option value="Cheshire">Cheshire</option>
      <option value="Chester">Chester</option>
      <option value="Clinton">Clinton</option>
      <option value="Colchester">Colchester</option>
      <option value="Colebrook">Colebrook</option>
      <option value="Columbia">Columbia</option>
      <option value="Cornwall">Cornwall</option>
      <option value="Coventry">Coventry</option>
      <option value="Cromwell">Cromwell</option>
      <option value="Danbury">Danbury</option>
      <option value="Darien">Darien</option>
      <option value="Deep River">Deep River</option>
      <option value="Derby">Derby</option>
      <option value="Durham">Durham</option>
      <option value="East Granby">East Granby</option>
      <option value="East Haddam">East Haddam</option>
      <option value="East Hampton">East Hampton</option>
      <option value="East Hartford">East Hartford</option>
      <option value="East Haven">East Haven</option>
      <option value="East Lyme">East Lyme</option>
      <option value="East Windsor">East Windsor</option>
      <option value="Eastford">Eastford</option>
      <option value="Easton">Easton</option>
      <option value="Ellington">Ellington</option>
      <option value="Enfield">Enfield</option>
      <option value="Essex">Essex</option>
      <option value="Fairfield">Fairfield</option>
      <option value="Farmington">Farmington</option>
      <option value="Franklin">Franklin</option>
      <option value="Glastonbury">Glastonbury</option>
      <option value="Goshen">Goshen</option>
      <option value="Granby">Granby</option>
      <option value="Greenwich">Greenwich</option>
      <option value="Griswold">Griswold</option>
      <option value="Groton">Groton</option>
      <option value="Guilford">Guilford</option>
      <option value="Haddam">Haddam</option>
      <option value="Hamden">Hamden</option>
      <option value="Hampton">Hampton</option>
      <option value="Hartford">Hartford</option>
      <option value="Hartland">Hartland</option>
      <option value="Harwinton">Harwinton</option>
      <option value="Hebron">Hebron</option>
      <option value="Kent">Kent</option>
      <option value="Killingly">Killingly</option>
      <option value="Killingworth">Killingworth</option>
      <option value="Lebanon">Lebanon</option>
      <option value="Ledyard">Ledyard</option>
      <option value="Lisbon">Lisbon</option>
      <option value="Litchfield">Litchfield</option>
      <option value="Lyme">Lyme</option>
      <option value="Madison">Madison</option>
      <option value="Manchester">Manchester</option>
      <option value="Mansfield">Mansfield</option>
      <option value="Marlborough">Marlborough</option>
      <option value="Meriden">Meriden</option>
      <option value="Middlebury">Middlebury</option>
      <option value="Middlefield">Middlefield</option>
      <option value="Middletown">Middletown</option>
      <option value="Milford">Milford</option>
      <option value="Monroe">Monroe</option>
      <option value="Montville">Montville</option>
      <option value="Morris">Morris</option>
      <option value="Naugatuck">Naugatuck</option>
      <option value="New Britain">New Britain</option>
      <option value="New Canaan">New Canaan</option>
      <option value="New Fairfield">New Fairfield</option>
      <option value="New Hartford">New Hartford</option>
      <option value="New Haven">New Haven</option>
      <option value="New London">New London</option>
      <option value="New Milford">New Milford</option>
      <option value="Newington">Newington</option>
      <option value="Newtown">Newtown</option>
      <option value="Norfolk">Norfolk</option>
      <option value="North Branford">North Branford</option>
      <option value="North Canaan">North Canaan</option>
      <option value="North Haven">North Haven</option>
      <option value="North Stonington">North Stonington</option>
      <option value="Norwalk">Norwalk</option>
      <option value="Norwich">Norwich</option>
      <option value="Old Lyme">Old Lyme</option>
      <option value="Old Saybrook">Old Saybrook</option>
      <option value="Orange">Orange</option>
      <option value="Oxford">Oxford</option>
      <option value="Plainfield">Plainfield</option>
      <option value="Plainville">Plainville</option>
      <option value="Plymouth">Plymouth</option>
      <option value="Pomfret">Pomfret</option>
      <option value="Portland">Portland</option>
      <option value="Preston">Preston</option>
      <option value="Prospect">Prospect</option>
      <option value="Putnam">Putnam</option>
      <option value="Redding">Redding</option>
      <option value="Ridgefield">Ridgefield</option>
      <option value="Rocky Hill">Rocky Hill</option>
      <option value="Roxbury">Roxbury</option>
      <option value="Salem">Salem</option>
      <option value="Salisbury">Salisbury</option>
      <option value="Scotland">Scotland</option>
      <option value="Seymour">Seymour</option>
      <option value="Sharon">Sharon</option>
      <option value="Shelton">Shelton</option>
      <option value="Sherman">Sherman</option>
      <option value="Simsbury">Simsbury</option>
      <option value="Somers">Somers</option>
      <option value="South Windsor">South Windsor</option>
      <option value="Southbury">Southbury</option>
      <option value="Southington">Southington</option>
      <option value="Sprague">Sprague</option>
      <option value="Stafford">Stafford</option>
      <option value="Stamford">Stamford</option>
      <option value="Sterling">Sterling</option>
      <option value="Stonington">Stonington</option>
      <option value="Stratford">Stratford</option>
      <option value="Suffield">Suffield</option>
      <option value="Thomaston">Thomaston</option>
      <option value="Thompson">Thompson</option>
      <option value="Tolland">Tolland</option>
      <option value="Torrington">Torrington</option>
      <option value="Trumbull">Trumbull</option>
      <option value="Union">Union</option>
      <option value="Vernon">Vernon</option>
      <option value="Voluntown">Voluntown</option>
      <option value="Wallingford">Wallingford</option>
      <option value="Warren">Warren</option>
      <option value="Washington">Washington</option>
      <option value="Waterbury">Waterbury</option>
      <option value="Waterford">Waterford</option>
      <option value="Watertown">Watertown</option>
      <option value="Wethersfield">Wethersfield</option>
      <option value="West Hartford">West Hartford</option>
      <option value="West Haven">West Haven</option>
      <option value="Westbrook">Westbrook</option>
      <option value="Weston">Weston</option>
      <option value="Westport">Westport</option>
      <option value="Willington">Willington</option>
      <option value="Wilton">Wilton</option>
      <option value="Winchester">Winchester</option>
      <option value="Windham">Windham</option>
      <option value="Windsor">Windsor</option>
      <option value="Windsor Locks">Windsor Locks</option>
      <option value="Wolcott">Wolcott</option>
      <option value="Woodbridge">Woodbridge</option>
      <option value="Woodbury">Woodbury</option>
      <option value="Woodstock">Woodstock</option>
    </select>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 3435.99 2627.34">
  <g id="Layer_2" data-name="Layer 2">
    <g id="Layer_2-2" data-name="Layer 2">
      <path class="south-central" data-town="East Haddam" data-tooltip="true" title="East Haddam" data-networks="03" d="M2295.16,1479.56a6.83,6.83,0,0,1,1.62-.64l223.39-55.18-37.32-121.58a6.83,6.83,0,0,1-.27-1.27l-10.51-89.32-43.65,2.67-142.57,34a7.14,7.14,0,0,1-8-3.55l-20.66,4.27a2.08,2.08,0,0,1-2.26-1l-10.87-19.48-22.73,35.25a.34.34,0,0,1-.08.09h0l-20.56,28.32V1337l9.94,33h4.2a2.1,2.1,0,0,1,2.1,2.08h0v28.72Z"/></path>
      <path class="south-central" data-town="Middlefield" data-tooltip="true" title="Middlefield" data-networks="03" d="M1844,1340.52V1324l-11.15-17.29a2.16,2.16,0,0,1-.33-1.13v-11.31l-5.07-12a1.71,1.71,0,0,1-.14-.49l-2.55-16.23-29-41.15H1774.1l-17,4.88a2.25,2.25,0,0,1-.58.08l-62.67,1,22.2,93.64a7.11,7.11,0,0,1,.2,1.66v31.49l.91,5.09a7.22,7.22,0,0,1,5.45,2.49c.65.76,22.46-.88,22.75.08l24.49-3.57Z"/></path>
      <path class="south-central" data-town="Middletown" data-tooltip="true" title="Middletown" data-networks="03" d="M1848.68,1339.2l215.87-51v-76.41l-36.21-22.13H1908.09a2.09,2.09,0,0,1-1.37-.51l-20.19-17.41-38-27.36a2.09,2.09,0,0,1-.87-1.7v-16.1l-25.17-15.1a2.12,2.12,0,0,1-1-1.8v-5.24h-40.34a2.11,2.11,0,0,1-1.34-.48l-5.88-4.91-7.16-1.49a7.21,7.21,0,0,1-5.1,5.46l-30.9,8.58v5.59a7.19,7.19,0,0,1-5.4,7l-25.75,6.65v26c.66,1.1-9.64,9.45-9.64,10.73l-1.36,40.78,4.24,17.9,63.37-1,17-4.88a2.25,2.25,0,0,1,.58-.08h23a2.08,2.08,0,0,1,1.71.89l29.86,42.44a2,2,0,0,1,.36.88l2.58,16.46,5.14,12.18a2.05,2.05,0,0,1,.16.81v11l11.15,17.29a2.07,2.07,0,0,1,.33,1.13v15.94Z"/></path>
      <path class="south-central" data-town="East Hampton" data-tooltip="true" title="East Hampton" data-networks="03" d="M2192.41,1258a1.94,1.94,0,0,1,.68,0l25.45,2.44,23.93-37.11a2.1,2.1,0,0,1,2.9-.62,2.19,2.19,0,0,1,.69.73l11.82,21.19,18.08-3.74-58.28-118.5-93.22-136.17L2075,991.58l21.28,43.3a2.09,2.09,0,0,1-.28,2.28l-5.76,6.81a2,2,0,0,1-1,.65l-24.55,7.44,10,15.07a2.08,2.08,0,0,1,.35,1.16v11.52a2.09,2.09,0,0,1-.2.88l-28.13,60.87v15.85l2,4.31,3.64,7.45a2.14,2.14,0,0,1,0,1.85l-10.74,21.78,26.2,16a2.1,2.1,0,0,1,1,1.79v76.6Z"/></path>
      <path class="south-central" data-town="Chester" data-tooltip="true" title="Chester" data-networks="03" d="M2252,1572.87l75.56-25.28L2293,1506.34a7.23,7.23,0,0,1-1.68-4.62V1485.9a7.18,7.18,0,0,1,.86-3.4l-12-12.11-166.68,38.9,27.91,100.37,106.1-20.34,5.42-4.73-2.31-9.23A2.09,2.09,0,0,1,2252,1572.87Z"/></path>
      <path class="south-central" data-town="Cromwell" data-tooltip="true" title="Cromwell" data-networks="03" d="M1907.64,1103.45l13-27.35-2.74-34.93-4.87-23.62a2.44,2.44,0,0,1,0-.54l.37-6.84L1767,1048.87v44.44l8.35,1.74a2.13,2.13,0,0,1,.92.44l5.7,4.75h41.68a2.1,2.1,0,0,1,2.09,2.1v6.14l25.18,15.11a2.07,2.07,0,0,1,1,1.8v16.21l33.07,23.82-2.3-13.84a2.12,2.12,0,0,1,.21-1.33Z"/></path>
      <path class="south-central" data-town="Portland" data-tooltip="true" title="Portland" data-networks="03" d="M2060.8,1048.86l26.65-8.07,4.47-5.29-21.34-43.44-151.79,16.67-1.18.31-.43,7.93,4.84,23.48v.26l2.8,35.62a2.05,2.05,0,0,1-.2,1.06l-13.27,27.94-24.5,46.25,2.9,17.42,19.09,16.46H2028.9a2.11,2.11,0,0,1,1.09.3l7.93,4.85,10.12-20.53-3.22-6.58-2.15-4.77a2.11,2.11,0,0,1-.18-.86V1141.1a2.08,2.08,0,0,1,.19-.88l28.12-60.87v-10.43L2059.66,1052a2.1,2.1,0,0,1-.23-1.87A2.14,2.14,0,0,1,2060.8,1048.86Z"/></path>
      <path class="south-central" data-town="Westbrook" data-tooltip="true" title="Westbrook" data-networks="03"d="M2308.36,1741l10.22-20.7-20.49-10.8-59.8,6.22h-.21a2.11,2.11,0,0,1-1.17-.35l-42-27.89-31.26,2.36,4,14.32a2.1,2.1,0,0,1,.08.56v8.61l44.68,157.56,14.28-1.37,14-13.71-6.46-16.8,30.87-.86,20-7.31,21.47,5.46,4.76-4.76,10,4.33h11.43l-24.57-93.42A2.08,2.08,0,0,1,2308.36,1741Z"/></path>
      <path class="south-central" data-town="Clinton" data-tooltip="true" title="Clinton" data-networks="03" d="M2208.19,1871.34l-44.12-155.57h-30.31l-94.11,57.47,58.3,49.58h11.92a7.19,7.19,0,0,1,7.19,7.19v45.63l8.05-6.43,11.63-1.5,20-17,12.94,27.33-9.92,6.75.35,1.84,8.21.66,11.14,10.81,19.47-25.84Z"/></path>
      <path class="south-central" data-town="Old Saybrook" data-tooltip="true" title="Old Saybrook" data-networks="03" d="M2471.71,1844.21l4.65-10.83-13.18-3.56,3.24-21.87-7.93-12.37h-11.15V1784l-14.45-10.2,12.15-12.15,12.75,8.36,4.57-2-1.43-55.54-22.69-22.69-40.77-.73-70.41,20-3.72,11a1.89,1.89,0,0,1-.11.25h0l-10.78,21.83,24.66,93.73h1l11.85-15.29,33.33,5,9.4,16.66v13.46l53.62,4.15,7.83-15.68Z"/></path>
      <path class="south-central" data-town="Killingworth" data-tooltip="true" title="Killingworth" data-networks="03" d="M2133.17,1711.58h30.39v-6.52l-54.19-194.81-70.08,16.35a2,2,0,0,1-.48.06,2.07,2.07,0,0,1-1.43-.57l-59.63-56.26-19,2.32a4,4,0,0,1,0,.69V1490l7.09,12.41a7.16,7.16,0,0,1,1,3.56v50.74a7.16,7.16,0,0,1-.82,3.33l-5.15,9.88.35,11.66,9.31,8.5a7.19,7.19,0,0,1,2.34,5.31v17.83l17.23,19a7.17,7.17,0,0,1,1.86,4.83v72.51l13.67,7.2L2015,1719c2.85,0,9.6,3.55,10.76,6.14l2.72,9.47a8.11,8.11,0,0,1,.41,1.17l8.46,33.88,94.68-57.81A2.14,2.14,0,0,1,2133.17,1711.58Z"/></path>
      <path class="south-central" data-town="Deep River" data-tooltip="true" title="Deep River" data-networks="03" d="M2196.67,1683.64l39.31,26.13v-26a2.08,2.08,0,0,1,1-1.81l89.67-52.17,5.06-27.08a2.09,2.09,0,0,1,1.32-1.58l41.21-15.64-3.56-4.19L2355,1578a7.18,7.18,0,0,1-4-2.43L2330.4,1551l-75.29,25.19,2.15,8.59a2.07,2.07,0,0,1-.65,2.09l-6.81,5.94a2.22,2.22,0,0,1-1,.48l-106.32,20.38,20,72.06,32.81-2.47A2.06,2.06,0,0,1,2196.67,1683.64Z"/></path>
      <path class="south-central" data-town="Essex" data-tooltip="true" title="Essex" data-networks="03" d="M2299.48,1705.54l20.68,10.9,3.28-9.72a2.09,2.09,0,0,1,1.41-1.35l71.77-20.43a2.49,2.49,0,0,1,.61-.08l35.1.63,6.57-.35-10.84-27.64-22.78-20.68-13.46-30.61L2377.18,1589l-41.51,15.75-5,26.87a2.12,2.12,0,0,1-1,1.43l-89.46,52v26.33l58.12-6A2.08,2.08,0,0,1,2299.48,1705.54Z"/></path>
      <path class="south-central" data-town="Haddam" data-tooltip="true" title="Haddam" data-networks="03" d="M2212.8,1402.57v-28.35h-3.67a2.1,2.1,0,0,1-2-1.49l-10.48-34.81a2,2,0,0,1-.09-.6v-45.87a2.1,2.1,0,0,1,.4-1.23l18.8-25.91-22.72-2.17-97.32,23-30,7.08h0l-162.22,38.33,26.92,31.42a2.09,2.09,0,0,1,.51,1.37V1420l108.46,102.33,237.24-55.38Z"/></path>
      <path class="south-central" data-town="Durham" data-tooltip="true" title="Durham" data-networks="03" d="M1927.43,1422.36a2.07,2.07,0,0,1-.66-1.52V1364.1L1899,1331.62l-49.23,11.63-79,22.1a2.22,2.22,0,0,1-.57.07l-25.67,5.42L1722,1517.72h25.2l178.61-38.45c1.47-.33,18.86-5.55,20.24-5l7.65-1.8c1,.43,2.76-5.21,3.47-4.39l16.73-2Z"/></path>
      <path class="south-central" data-town="Seymour" data-tooltip="true" title="Seymour" data-networks="03" d="M1176.22,1637.66l9.35-32.72,2.46-31.13h-28.39l4.54,15.54c.27.6-4.21,1.29-4.52,1.87a2.08,2.08,0,0,1-1.52,1.08l-15.57,2.52-6.86,6.85a2.11,2.11,0,0,1-1.48.61h-11l-21.18,11.16-7.11,30.46c-.13.52-9.36,2.37-9.81,2.67l-61.75,40.23c1.34,8.13,1.15,11.33,1.42,19.56.94,3.5,10.2,23.76,24.65,34.17a84,84,0,0,1,10.14,8.79l60.84-49.32a2.11,2.11,0,0,1,1.32-.47H1183v-20.36l-6.5-10.49a2.12,2.12,0,0,1-.31-1.1v-29.34A1.89,1.89,0,0,1,1176.22,1637.66Z"/></path>
      <path class="northwest" data-town="Cheshire" data-tooltip="true" title="Cheshire" data-networks="05" d="M1521.92,1328.71l-8.23-39.24-5.12-.83a7.2,7.2,0,0,1-5.09-2.11L1487.91,1271a7.15,7.15,0,0,1-2.1-5.09V1217l-9.18-4.89-79.54,11.71-54.25,8a7.2,7.2,0,0,1-5.75-1.66,7.54,7.54,0,0,1-1.78-2.34l-9.13,1.39-28.54,43,45,20.29a2.06,2.06,0,0,1,.95.85l27.65,47.32a2.1,2.1,0,0,1,.24,1.51l-23.09,105,8.76,21.23,56.09-20.59a2.07,2.07,0,0,1,1.47,0l50.21,14.78,8.41-10.27-5.53-25.63c-.12-.51,4-7.22,0,0Z"/></path>
      <path class="south-central" data-town="Bethany" data-tooltip="true" title="Bethany" data-networks="03" d="M1350.94,1481.86l-7-25.85-60.52-18.36-57.65,24.55-.2,6.45,3.08,2.74a2.1,2.1,0,0,1,2.1,2.1l-.15,35c0,.14.17,8.71.15,8.85l-12.83,54.74a2.11,2.11,0,0,1-2.06,1.69h-23.57l-2.46,30.3,27.24,18,89.36-9.45,45.28-3.22,12.87-5.72,5.85-23.4-16-31.6-17.6-7a2.1,2.1,0,0,1-1.25-2.49Z"/></path>
      <path class="northwest" data-town="Southbury" data-tooltip="true" title="Southbury" data-networks="05" d="M971.31,1472.7h1.57v-36.14a2.11,2.11,0,0,1,1-1.82l8.91-5.15v-14l-9.16-7.23a2.11,2.11,0,0,1-.8-1.64v-17.29h0v-.19l3.11-34.71-2.65-9.35L658.05,1397l8,60.65a8.94,8.94,0,0,1,.11,1.27v8.39l17.83,6.27,13.66-2.44,6.43-.32c2.21-1.82,2.95-5.16,5.5-3.85l8.29,4.27a7.18,7.18,0,0,1,3.11,3.13l7,7.81a7.14,7.14,0,0,1,.79,3.27V1500l10.1,7.88H751l12.55-6.28a7.22,7.22,0,0,1,7.76.86l6.78,5.52a7.17,7.17,0,0,1,1.33,1.42l22.24,31.23,8.72,2.91,16.57-7.19a7.19,7.19,0,0,1,4.73-.35l15.83,4.27a7.19,7.19,0,0,1,3.67,2.36l5.12,6.19h15a7.12,7.12,0,0,1,4,1.23L900,1566.74l6,1.72,76-66.66-12.39-15.72a2.11,2.11,0,0,1-.45-1.3v-10a2.1,2.1,0,0,1,2.12-2.08Z"/></path>
      <path class="northwest" data-town="Middlebury" data-tooltip="true" title="Middlebury" data-networks="02" d="M980.11,1353.75a2.16,2.16,0,0,1,.07.76l-2.94,32.81h99.86v-14.14a2.14,2.14,0,0,1,.57-1.44l18.37-19.39,3.07-30.72a2.09,2.09,0,0,1,2.09-1.88h24.52l-18.45-29.81a2.12,2.12,0,0,1-.31-1.1V1278l-8-11.55a2.2,2.2,0,0,1-.31-.7l-13.3-53.79h-8l-113.65,45.66-.32,28.44v8.62c4,0,10.58,1,10.58,5l2.72,37.82Z"/></path>
      <path class="northwest" data-town="Oxford" data-tooltip="true" title="Oxford" data-networks="05" d="M1096.3,1498.63l27.84-44.87-45.8-41.32a2.09,2.09,0,0,1-.69-1.55V1391.5H977.07v14.18l9.16,7.23a2.11,2.11,0,0,1,.8,1.64v16.24a2.11,2.11,0,0,1-1,1.82l-8.91,5.15v37a2.11,2.11,0,0,1-2.09,2.09h-1.57V1484l13.17,16.72a2.09,2.09,0,0,1-.27,2.87l-75.52,66.19,8.25,2.37a7.23,7.23,0,0,1,3.49,2.24L935.84,1590a7,7,0,0,1,1.21,2c3.56,8.88,11.27,22.81,17.25,25.93,10.82,5.66,27.85,14.18,28,14.26a7,7,0,0,1,1.19.75c5.27,4.07,31.81,25,36.06,37.52.75,2.27,1.38-.43,1.87,1.91l59.61-38.84,7.15-30.62a2.1,2.1,0,0,1,1.12-1.41l31.44-15.19a2,2,0,0,1,.91-.21h6.84l-32-30.79a2.12,2.12,0,0,1-.53-1.4v-54.17A2.19,2.19,0,0,1,1096.3,1498.63Z"/></path>
      <path class="northwest" data-town="Prospect" data-tooltip="true" title="Prospect" data-networks="05" d="M1283.29,1426.57a2.14,2.14,0,0,1,1.37,0l60,18.2,22.56-102.63-26.9-46-45.87-20.67-84.3,31.51,11.43,43,33.41,62.65a2.18,2.18,0,0,1,.25,1v24Z"/></path>
      <path class="northwest" data-town="Wolcott" data-tooltip="true" title="Wolcott" data-networks="05" d="M1335.36,1204.39l5-10V1167.7a7.16,7.16,0,0,1,2.11-5.08l1.66-1.66L1343,1046.39,1265,1062.74l-30.8,20.36a7.13,7.13,0,0,1-4.93,2H1214.8v14.19a7.2,7.2,0,0,1-3.88,6.38l7.51,53.87,71,71,45.1-6.89V1207.6A7.19,7.19,0,0,1,1335.36,1204.39Z"/></path>
      <path class="south-central" data-town="Guilford" data-tooltip="true" title="Guilford" data-networks="03" d="M1903.25,1883.84l1.4,8.07,5.68-1.86,4.63-10.14a2.12,2.12,0,0,1,1.91-1.22h4.19v-5.24a2.06,2.06,0,0,1,.52-1.38l6.41-7.32-2.52-5a2.35,2.35,0,0,1-.21-.73l-1.57-15.71a2.09,2.09,0,0,1,1.06-2l12.68-7.07.93-8.61a2.13,2.13,0,0,1,.28-.85l9.74-16.4,1.92-13.91-28.18-36.93h-28.3a2.1,2.1,0,0,1-1.83-1.07l-34.57-61.61a2.08,2.08,0,0,1-.26-.81l-19.62-190.9-60.13,13.38-32.88,60,3.65,215.49,38.78,121.5,2.27,1.59,7.43-3.18,7.52,2.51,11.74-8.61,13.08,8.71-3.87,7.09-8.76,7V1933l18,3.46,13.36-7.49,1.63-6.52,10.76-2.69,2.81-7.63h11l3.42-8.43-9.32-10.17,8-5.6,7.57,3.61,6-6Z"/></path>
      <path class="south-central" data-town="Madison" data-tooltip="true" title="Madison" data-networks="03" d="M2014.11,1870.51l31.8-4.54,33.5,15.76,24.55,31.84,3.78,4.64,23.13-2-1.77-15-9.1-6.83-.28-3.78-3.34-1.23a7.2,7.2,0,0,1-4.7-6.74V1837.2l.15-4.11a4.15,4.15,0,0,0-4.06-4.31c-4.49-.09-10.91-.36-11.8-1.12l-58.12-49.43c-1.14-1-5.48-6.63-5.84-8.09l-5.87-33.21-3.88-8.73-8.07-5.23a7.21,7.21,0,0,1-3.35-.82l-18.4-4.82a7.18,7.18,0,0,1-3.84-6.36v-74.09l-17.23-19.05a7.16,7.16,0,0,1-1.86-4.82v-17.43l-9.21-8.41a7.22,7.22,0,0,1-2.34-5.09l-.51-16.58a7.26,7.26,0,0,1,.82-3.54l5.21-10V1504.9l-7.09-12.4a7.22,7.22,0,0,1-1-3.57v-12.41l-113.78,25.64,19.63,191,33.76,60.16h28.1a2.11,2.11,0,0,1,1.67.82l29.34,38.45a2.13,2.13,0,0,1,.41,1.56l-2.1,15.19a2.18,2.18,0,0,1-.27.79l-9.72,16.37-1,9.24a2.12,2.12,0,0,1-1.06,1.6l-12.42,6.93,1.39,14,3,5.94a2.1,2.1,0,0,1-.29,2.32l-6.82,7.79v6.55a2.1,2.1,0,0,1-2.1,2.09h-4.93l-2.43,5.3c1.31-.46,2.37-.86,3-1.14,3.23-1.43,14.86-.58,23,.24l1.85-7.76,18.24.83,22-11.79L1993,1875l9.58-1.8,3.61-5.41Z"/></path>
      <path class="south-central" data-town="New Haven" data-tooltip="true" title="New Haven" data-networks="03" d="M1489.4,1856.16a2.31,2.31,0,0,1,.1-.64l37.1-114.84-114.76,27.42a2.42,2.42,0,0,1-1.07,0l-65.59-18.75-15.36,1.92-20.43,32.17a1.93,1.93,0,0,1-.28.36l-9.34,9.34V1803l3.6,4.38,36.88,7.74,19.61-1.46a2.12,2.12,0,0,1,2.19,1.6l4.6,19.23,41.34,51.27v-12.55l-9-9.79,4.42-7.74,22.59-16.46,15.11-14.39,8.3-27.28,15-.62-3.13,15.11-2.28,4.31,4.52,2.83,9.57-10.81,8.21-26.19,9.69-2.64-1.34,32-9.76,15.38L1460,1849.34l-3.77,15.77,4,12.08,7.91,7.91v18.34l15.55,21.13-15.17,17.16v7.75l3.52,2.18c7.64-3.57,15.73-7.88,17.26-9.56Z"/></path>
      <path class="south-central" data-town="East Haven" data-tooltip="true" title="East Haven" data-networks="03" d="M1560.27,1955.73h6.29l.6-5.1-.72-10.14-5.09-11.72a2.1,2.1,0,0,1,0-1.7l6.62-14.75-.49-15.48-2.35-4a2.07,2.07,0,0,1-.28-.87l-1.4-14.66a2.16,2.16,0,0,1,.07-.76l2.12-7.63,1.8-40.46-3.87-10.48a2.09,2.09,0,0,1,.3-2l29-38.3,5.43-97h-12.69L1580,1727a2.11,2.11,0,0,1-1.62,1.79l-47,10.74-37.78,116.94v86.11c0,1.19,0,3.58-17.19,11.74l5.38,3.33,10.94-4,9.91,3.44,14.68-4.14,11.8,3.93,14.68-11.21Z"/></path>
      <path class="south-central" data-town="North Branford" data-tooltip="true" title="North Branford" data-networks="03" d="M1658.61,1776.54a2.11,2.11,0,0,1,1.32.47l44.57,36.32,39.67-18.12-.07-2.32a1.76,1.76,0,0,1-.1-.6l-3.67-216.35a2,2,0,0,1,.26-1l31.38-57.22-28.75,6.39a6.79,6.79,0,0,1-1.56.18h-18.59a7.17,7.17,0,0,1-4.75-1.81l-111.08,68.42-10.15,185.52Z"/></path>
      <path class="south-central" data-town="Branford" data-tooltip="true" title="Branford" data-networks="03" d="M1745.91,1799l-40.86,18.66a2,2,0,0,1-.86.19,2.1,2.1,0,0,1-1.33-.47l-45-36.68-61.95-.17-28,37,3.62,9.8a2.27,2.27,0,0,1,.13.82l-1.84,41.12a1.84,1.84,0,0,1-.07.47l-2.08,7.49L1569,1891l2.38,4.06a2.07,2.07,0,0,1,.29,1l.52,16.5a2.12,2.12,0,0,1-.18.93l-6.43,14.34,4.87,11.2a2.33,2.33,0,0,1,.17.69l.66,9.38,11.27-.91,4.28-4.52-8-11.07,22-20.21,24.7,5.83-.79,15.8,5.31,3.29,5.9-1.54,6.11-16.81,17.59-2.31,5.1,5.1,10.46-2.79,17.89,5.47,14.55-10.19,13-.92,8.77,11.45,25.79.68,12.68-14.6,9.91,2.2,2.82-4.23.74.52Z"/></path>
      <path class="south-central" data-town="Hamden" data-tooltip="true" title="Hamden" data-networks="03" d="M1481.39,1741.3l14.27-20.69-6.54-7.67a2.11,2.11,0,0,1-.5-1.36v-9.95a2.25,2.25,0,0,1,.11-.68l2.57-7.48-2-3.51-6.43-2.44-26.21,2.83a2.09,2.09,0,0,1-2-.94l-6.28-9.69a2.11,2.11,0,0,1-.34-1.14v-26.2a2.08,2.08,0,0,1,.36-1.18l7.86-11.52a2.17,2.17,0,0,1,1-.77l11.08-4.42,8.23-16,4.68-11.35a2.13,2.13,0,0,1,1-1.09l10.78-5.22,10.39-8.5-2.82-16.53-7.33-6.75a2.07,2.07,0,0,1-.66-1.74l1-11a2.05,2.05,0,0,1,.42-1.06c7.14-9.46,18-23.93,18.78-25,.85-1.27,9.07-6.8,24.39-16.42l3.48-12.78-62.16-24.18-3.18,3.65-61.91-19.45-56.21,20.63L1340,1538.5l16.61,6.64a2.13,2.13,0,0,1,1.09,1l16.76,33a2.11,2.11,0,0,1,.17,1.46l-6.29,25.15h0l-31.74,122.42,10.14,17.24,64.67,18.47,69.86-16.69H1481v-4.71A2.08,2.08,0,0,1,1481.39,1741.3Z"/></path>
      <path class="south-central" data-town="Woodbridge" data-tooltip="true" title="Woodbridge" data-networks="03" d="M1296.19,1790.77,1306,1781l20.83-32.81a2.08,2.08,0,0,1,1.51-1l13.6-1.7-9.38-16a2.06,2.06,0,0,1-.23-1.59l30.87-119-10.18,4.52a1.89,1.89,0,0,1-.7.17l-45.57,3.25-90,9.52h-.22a2.08,2.08,0,0,1-1.16-.35l-26.43-17.48-8.56,30V1667l6.49,10.49a2.08,2.08,0,0,1,.32,1.11v31.84l31.08,46.62a2,2,0,0,1,.34,1l3.53,48.87h18a2.12,2.12,0,0,1,.75.14l14.83,5.73h16.88l6.71-9.2a2.1,2.1,0,0,1,2.12-.81l15.47,3.25-.76-.92a2.16,2.16,0,0,1-.47-1.33v-11.53A2.08,2.08,0,0,1,1296.19,1790.77Z"/></path>
      <path class="south-central" data-town="Derby" data-tooltip="true" title="Derby" data-networks="03" d="M1201.13,1806.92h16.76l-2.27-31.43h-29.86l-6.25,4.8a2.07,2.07,0,0,1-1.28.44,2.19,2.19,0,0,1-.67-.11l-29-9.84h-53.4l-5.72,4.52a2.11,2.11,0,0,1-1.3.45h-3.34a56.91,56.91,0,0,0,15.13,9.69c19.74,8.25,48.77,38.74,59.52,50.52l40.48-28.65A2.15,2.15,0,0,1,1201.13,1806.92Z"/></path>
      <path class="south-central" data-town="North Haven" data-tooltip="true" title="North Haven" data-networks="03" d="M1529.25,1735.74h0l46.76-10.67,5.59-46.73a2.09,2.09,0,0,1,2.08-1.85h14.78l4.66-83.2a2.25,2.25,0,0,1-.58.08H1590a2.09,2.09,0,0,1-2.08-1.9l-5.47-58-43.19-16c-9,5.67-21.55,13.75-23,15.19-1.51,2.15-15.58,20.8-18.5,24.66l-.89,9.37,7.09,6.53a2,2,0,0,1,.64,1.19l3.15,18.44a2.12,2.12,0,0,1-.74,2l-11.53,9.43a1.91,1.91,0,0,1-.41.26l-10.28,5-4.41,10.69-.07.16-8.63,16.76a2.13,2.13,0,0,1-1.09,1l-11.21,4.48-7.13,10.46V1678l5.25,8.09,25.43-2.75a2.13,2.13,0,0,1,1,.13l7.6,2.88a2.08,2.08,0,0,1,1.07.91l2.88,5a2.16,2.16,0,0,1,.17,1.74l-2.77,8v8.83l7.09,8.32a2.1,2.1,0,0,1,.13,2.56l-3.67,5.24-11.15,16.21v3.12l44-10.53Z"/></path>
      <path class="south-central" data-town="Wallingford" data-tooltip="true" title="Wallingford" data-networks="03" d="M1716,1516l21.87-145.46H1720.1a7.2,7.2,0,0,1-7.19-7.19V1363l-184.19-65.36,8.35,39.78a2.07,2.07,0,0,1-.22,1.44l-54.09,98,5.78,24.36a2.11,2.11,0,0,1-.41,1.81l-8.2,10,64,24.75a2.09,2.09,0,0,1,1.27,2.5l-3.69,13.55,43.6,16.1a2.08,2.08,0,0,1,1.36,1.77l5.41,57.47H1602l114.16-70.3A7.13,7.13,0,0,1,1716,1516Z"/></path>
      <path class="south-central" data-town="Milford" data-tooltip="true" title="Milford" data-networks="03" d="M1285.33,1958l-18.2-13.29h-63.75a2,2,0,0,1-.6-.08l-58.12-17.19c-.31,7.23-.59,13.81-.75,17.53-.09,2.1-.14,3.35-.14,3.42a7.42,7.42,0,0,1-.73,2.85l-35.36,72.11v73.52l3,1.88,5.75-6.83,7.53,9.41,12.21,1.31-1,13.07,2.14-.54,12.08-24.53,21.94-4.92,13.56-24.19,8.6-7.07,9.76,6.78h19.14l3.22,13.69,2.7,1.21,3-16.15,17.6-5.09L1259,2063l9.19-.89,17.9-22.46,2.77-21,.86-.31,2.73-29.55Z"/></path>
      <path class="south-central" data-town="West Haven" data-tooltip="true" title="West Haven" data-networks="03" d="M1310.62,2010.8l2.3-21.84,11.16-2,10.81,2.88,14.86-7.92,1.27-3.82-5.9-5.51,7.67-14.86,6.11-1.7,1.53-12.18,12.22-2.66,6.07,5.32,9.78-1.78,8.26-12,10.88-2.33,7.85-7.55-7.5-24.28v-6.06l-44.89-55.68a2,2,0,0,1-.41-.83l-4.3-18-18.13,1.34a2,2,0,0,1-.59,0l-32.58-6.85a1.77,1.77,0,0,1,0,.46l-3.15,26.72v.14l-11.5,61.15-3.12,55.62,7.27,31.67a2.43,2.43,0,0,1,0,.66l-2.58,27.92Z"/></path>
      <path class="south-central" data-town="Orange" data-tooltip="true" title="Orange" data-networks="03" d="M1267.81,1940.5a2.05,2.05,0,0,1,1.24.41l16.27,11.87,2.93-52.21a1.22,1.22,0,0,1,0-.27l11.51-61.22,3-25.75-1.75-2.13-19.27-4-6.53,9a2.12,2.12,0,0,1-1.7.86h-18.33a2.18,2.18,0,0,1-.76-.14l-14.82-5.73h-37.8l-39.53,28,1.33,1.51a7.12,7.12,0,0,1,1.55,3c1.27,5,4.91,21.87-1.3,29.81a65.39,65.39,0,0,1-6,6.23c-4.65,4.5-11.63,11.25-11.86,16.29s-.72,16.3-1.19,27.22l58.84,17.39Z"/></path>
      <path class="northwest" data-town="Waterbury" data-tooltip="true" title="Waterbury" data-networks="05" d="M1289.08,1234.85h-.31a2.13,2.13,0,0,1-1.49-.61L1215,1162a2.14,2.14,0,0,1-.59-1.2l-7.58-54.33h-28.45l-24.81,1.82v1.26l.11,13.19c2.09,1.31,4.45,4.34,4.44,6.81l-.2,9a7.19,7.19,0,0,1-4.22,6.55l-46.19,21-18,41.66c-.6,1.39,3,4.54,1.67,5.31l11.48,51.3,8.16,11.73a2.12,2.12,0,0,1,.37,1.19v10.93l19.5,31.51H1153l9.94-6.84a2.09,2.09,0,0,1,1.19-.37h19l110.07-41.14,27.43-41.35Z"/></path>
      <path class="northwest" data-town="Naugatuck" data-tooltip="true" title="Naugatuck" data-networks="05" d="M1166.4,1434.07a2.08,2.08,0,0,1,2.68-1l47.42,19.58,34.55-13.48V1414l-33.28-62.4a1.77,1.77,0,0,1-.18-.45l-11.39-42.81-22,8.22a2.1,2.1,0,0,1-.74.13h-18.73l-9.94,6.84a2.09,2.09,0,0,1-1.19.37h-50.49l-2.95,29.54a2.18,2.18,0,0,1-.56,1.23l-18.29,19.3v14a2.1,2.1,0,0,1,.52,1.37V1410l66.92,60.37Z"/></path>
      <path class="south-central" data-town="Meriden" data-tooltip="true" title="Meriden" data-networks="03" d="M1712.87,1325.49l-27.44-115.73a7.1,7.1,0,0,1-.19-1.66v-40.53h-14.75l-39.89,7.51-45.67,44.69a7.06,7.06,0,0,1-3,1.75l-15,4.48a7.2,7.2,0,0,1-9-4.84,7,7,0,0,1-.3-2v-19.79l-14.86-6,6,39.31a7.14,7.14,0,0,1-1.59,5.7l-20.45,24.47,2.08,2.76a7.22,7.22,0,0,1,1.46,4.33v11.56a7.17,7.17,0,0,1-3.73,6.29l1.07,5.09,185.2,65.72Z"/></path>
      <path class="northwest" data-town="Beacon Falls" data-tooltip="true" title="Beacon Falls" data-networks="05" d="M1218,1517l1.59-32.22-4.09-5c-1.16,0-1.1-4.94-1.1-6.1v-17.46l-45.08-18.62-18,37a2.1,2.1,0,0,1-2.81,1,1.92,1.92,0,0,1-.48-.32l-20.72-18.7-27.12,43.72v52.77l33.09,32,8.76-2.77a2.15,2.15,0,0,1,1.15-.58l4.84-1.35-6.17-17c-.5-1,5.62-2.3,6.67-2.8a2.15,2.15,0,0,1,.9-.2h59Z"/></path>
      <path class="south-central" data-town="Ansonia" data-tooltip="true" title="Ansonia" data-networks="03" d="M1093.12,1767a2.05,2.05,0,0,1,1.3-.45h54.48a1.92,1.92,0,0,1,.67.11l28.28,9.59,5.92-4.56a2.07,2.07,0,0,1,1.27-.43h30.28l-.9-12.4-31.12-46.68a2.08,2.08,0,0,1-.35-1.16v-7.34H1122.4l-60,48.62c2.31,2.44,4.59,5,6.91,7.58,3.53,3.94,7.11,7.93,10.91,11.64h7.16Z"/></path>
      <path class="northeast" data-town="Canterbury" data-tooltip="true" title="Canterbury" data-networks="04" d="M3102.71,755.55l11.64-7.76v-8a2.07,2.07,0,0,1,.57-1.43l19.55-21a2,2,0,0,1,1-.59l14.16-4.05,31.09-30.41-1.1-30.58-188.24.7-37.15,76.35a2.09,2.09,0,0,1-1.88,1.18h-4v19.27a2.13,2.13,0,0,1-.4,1.24l-9.53,13,.64,19.26,4.19,3.59a2.09,2.09,0,0,1,.73,1.68l-2.09,48.9v.33L2938.43,854l-1.1,47.4,195.28,29.21V819.46H3113a2.1,2.1,0,0,1-2.09-2.1v-18l-8.47-8.47a2.11,2.11,0,0,1-.61-1.48V757.29A2.1,2.1,0,0,1,3102.71,755.55Z"/></path>
      <path class="northeast" data-town="Pomfret" data-tooltip="true" title="Pomfret" data-networks="04" d="M3124.15,265.86,2941.3,280.23h-2.08l9.06,107.39V477.8l38.7-1.29A2.11,2.11,0,0,1,2989,478l9.26,28.63a2.38,2.38,0,0,1,.1.65v24.17l51.13-6.34,2.66-32.67a2.08,2.08,0,0,1,2.08-1.93h14.93v-17a2.1,2.1,0,0,1,1.85-2.08l100-11.94-6.19-11.25a2.34,2.34,0,0,1-.19-.5l-9.78-39.12a2.1,2.1,0,0,1,.36-1.78l16.45-21.55-17.09-20.54a2.12,2.12,0,0,1-.49-1.34V330.29Z"/></path>
      <path class="northeast" data-town="Eastford" data-tooltip="true" title="Eastford" data-networks="04" d="M2751.85,215.28v28.8l73.78,136.44a2.11,2.11,0,0,1,.25.92l3.45,99.54,53.09-1,61.68-2.06v-90L2935,280.23h-95.85a2.1,2.1,0,0,1-2.09-1.85l-10.74-92.87-88.14,4.9,13.39,23.84A2.18,2.18,0,0,1,2751.85,215.28Z"/></path>
      <path class="northeast" data-town="Brooklyn" data-tooltip="true" title="Brooklyn" data-networks="04" d="M3218.43,519.81h3l.94-7.51-31-7.92a2.1,2.1,0,0,1-1.56-1.8l-4-35.66-11.55-3.65-100.82,12v17.26a2.08,2.08,0,0,1-2.07,2.09h-15.11l-2.64,32.45a2.12,2.12,0,0,1-1.83,1.91l-53.44,6.62-6.07,112.68,187.19-.69-.12-3.42a2.13,2.13,0,0,1,.47-1.39L3194,625.2V613.41a2,2,0,0,1,.18-.84l24.24-55.42L3216.33,522a2.1,2.1,0,0,1,2-2.22h.12Z"/></path>
      <path class="northeast" data-town="Windham" data-tooltip="true" title="Windham" data-networks="04" d="M2708.08,679.32l-8,10.09-6.79,15.18.63,20.88a7.21,7.21,0,0,1-1.09,3.81l-9.09,14.55c-1.31,2.11-4.36,2.58-6.84,2.57L2583,744.68v9.93l28.34,17.14h5.33a7.3,7.3,0,0,1,5.12,2.14l141.64,133.57,13.33-25.73a7.22,7.22,0,0,1,7.34-3.62l44.44,7.14-9.13-122.15a2.13,2.13,0,0,1,.1-.83l23.3-69.95-94.59-13h-40.16Z"/></path>
      <polygon class="northeast" data-town="Sterling" data-tooltip="true" title="Sterling" data-networks="04" points="3293.8 903.52 3422.92 898.26 3398.1 579.37 3311.81 599 3293.8 903.52"/></polygon>
      <path class="northeast" data-town="Woodstock" data-tooltip="true" title="Woodstock" data-networks="04" d="M2830.46,184.7,2841,276h100l193.37-15.19-4-41L3073,9.34,2814.62,18l14.67,153.85c.26,3,1.64,6.87,1.17,12.84Z"/></path>
      <polygon class="northeast" data-town="Thompson" data-tooltip="true" title="Thompson" data-networks="04" points="3367.87 202.83 3351.58 0 3077.29 9.2 3134.09 217.27 3367.87 202.83"/></polygon>
      <path class="northeast" data-town="Killingly" data-tooltip="true" title="Killingly" data-networks="04" d="M3159.24,408.52l9.47,37.88,7.14,13,12.47,3.94a2.09,2.09,0,0,1,1.45,1.76l4,35.58,31.43,8a2.1,2.1,0,0,1,1.56,2.29l-1.4,11.18a2.1,2.1,0,0,1-2.08,1.83h-2.66l2,33.41a2.14,2.14,0,0,1-.17,1l-24.27,55.47v6.72l199.59-45.42-25-310.91-173.94,92.38Z"/></path>
      <path class="northeast" data-town="Putnam" data-tooltip="true" title="Putnam" data-networks="04" d="M3138.79,262.57a2.12,2.12,0,0,1-.48,1.55,2.08,2.08,0,0,1-1.44.74l-8.26.65,29.55,63.43a2.1,2.1,0,0,1,.2.89v32.76l16,19.22,21.46-28.11a2,2,0,0,1,.68-.58l175.94-93.44L3368.2,207l-233.39,14.41Z"/></path>
      <polygon class="northeast" data-town="Hampton" data-tooltip="true" title="Hampton" data-networks="04" points="2994.22 507.57 2985.55 480.75 2882.53 484.19 2863.58 484.54 2866.21 690.6 2898.04 715.53 2946.42 725.86 2951 725.86 2987.95 649.89 2994.22 533.72 2994.22 507.57"/></polygon>
      <polygon class="northeast" data-town="Chaplin" data-tooltip="true" title="Chaplin" data-networks="04" points="2733.15 486.05 2742.77 674.34 2845.82 688.5 2862 689.41 2859.39 484.62 2733.15 486.05"/></polygon>
      <path class="northeast" data-town="Scotland" data-tooltip="true" title="Scotland" data-networks="04" d="M2847.1,692.77l-23.46,70.42,9.18,122.69,100.23,15,1.1-47.08a2.16,2.16,0,0,1,0-.36l3.46-16.77,2-47.71-4.11-3.53a2,2,0,0,1-.73-1.52l-.7-20.9a2.06,2.06,0,0,1,.4-1.31l9.55-13.05v-19l-47.41-10.12a2.22,2.22,0,0,1-.85-.4l-32.49-25.44Z"/></path>
      <path class="northeast" data-town="Plainfield" data-tooltip="true" title="Plainfield" data-networks="04" d="M3198.17,624.86V626a2,2,0,0,1-.47,1.31l-14.17,17.56,1.37,38.33a2.1,2.1,0,0,1-.63,1.57l-32.13,31.43a2.16,2.16,0,0,1-.89.52l-14.11,4-18.6,19.93v8.25a2.1,2.1,0,0,1-.93,1.74L3106,758.41v30.14l8.47,8.47a2.11,2.11,0,0,1,.61,1.48v16.76h19.56a2.1,2.1,0,0,1,2.09,2.09h0v114l.89.13H3149l140.62-27.23,18-304.26Z"/></path>
      <path class="northeast" data-town="Ashford" data-tooltip="true" title="Ashford" data-networks="04" d="M2638,482.7l89.23-3.32c3.12,0,3.58.35,4.53,3.32l93.34-1.6-3.42-99-73.8-136.47a2.07,2.07,0,0,1-.26-1V215.82l-14.12-25.15-108.74,4.86Z"/></path>
      <path class="northwest" data-town="Torrington" data-tooltip="true" title="Torrington" data-networks="05" d="M918.49,433.45,870.4,697l73.74-14.74a1.41,1.41,0,0,1,.41,0h14.67a2.1,2.1,0,0,1,2.09,2.09h0v17.3l62.86,19V687a2.15,2.15,0,0,1,.49-1.35l13.62-16.24a2.13,2.13,0,0,1,1.43-.74l59.12-5.09,8.13-53.9,8.37-80.58,7.68-64.46L953.38,502a2.3,2.3,0,0,1-.45.05,2.1,2.1,0,0,1-2.1-2.1V441.81Z"/></path>
      <path class="northwest" data-town="Harwinton" data-tooltip="true" title="Harwinton" data-networks="05" d="M1029.06,748.33l-8,12v26.79l5.67,5.67a2,2,0,0,1,.56,1l5.09,22.39,35.12,31a2.38,2.38,0,0,1,.43.52L1083,873.9h50.46l1.41-7.22,80.31-18.22L1180.41,664l-79.62,3.53-59.86,5.16-12.57,15V722a2.1,2.1,0,0,1,1.05,1.79v23.4A2.1,2.1,0,0,1,1029.06,748.33Z"/></path>
      <path class="north-central" data-town="Plymouth" data-tooltip="true" title="Plymouth" data-networks="02" d="M1221.27,865.2l-20.61,3-50.84,11.5c.52,23.08,2,53.36.66,56.09a.24.24,0,0,0,0-.12c-1.26,3.76-5.14,58.42-5.59,65.69-.11,2.16,0,22.38,0,33.42l13,16.62a2,2,0,0,1,.44,1.18l1.71,31.79,15.69-.28a5.53,5.53,0,0,1,2.89-1h17.95l-.15-18.91c0-4,9.16-1.35,13.13-1.35l12.57,0,37.33-20.63L1240.6,868.48l-.88-2.87c-.44-1.45-6.19-2.44-6.19-2.44"/></path>
      <path class="northwest" data-town="Watertown" data-tooltip="true" title="Watertown" data-networks="05" d="M1145.54,1108.18l-1.22-20.11-1.53-.7-43.28-28.25a2.12,2.12,0,0,1-.84-1.09l-6-17.61-50-17.12a2.27,2.27,0,0,1-.72-.42l-10.12-9.06-17.7-5.16a2.18,2.18,0,0,1-.79-.43L997.93,994.8l-53.37,1.88,26.15,147.2,11.5,64.82,10.11,32.13,84.31-33.87a7,7,0,0,1,2.68-.52h5.07l17.21-39.87a7.2,7.2,0,0,1,3.63-3.7l44.51-20.18v-13.76l-1-.61a7.15,7.15,0,0,1-3.36-6.09v-9.51Z"/></path>
      <path class="northwest" data-town="Barkhamsted" data-tooltip="true" title="Barkhamsted" data-networks="05" d="M1127.86,459.2l176.75-39a7.2,7.2,0,0,1,5.91-6.51l45.61-8.08,38-163.77L1162,263.44a7.16,7.16,0,0,1-5.92-2.25,7,7,0,0,1-1.37-2.11l-3.16.32Z"/></path>
      <path class="northwest" data-town="Warren" data-tooltip="true" title="Warren" data-networks="05" d="M518.83,814.4v24.82l39.63,80.63L712,899.34V868.08l-15.55-36.27a2.12,2.12,0,0,1-.17-.83V735.61l-170.89-2,6,57a2.08,2.08,0,0,1-.25,1.22Z"/></path>
      <path class="northwest" data-town="New Milford" data-tooltip="true" title="New Milford" data-networks="05" d="M364.43,1023.59a7.15,7.15,0,0,1,3.88,7.56l-5,31.15,116,279.18a7.23,7.23,0,0,1,.55,2.76v53.47l9.58,19.79L563,1383.09l-4.57-8.42-15.57-7.38a2.07,2.07,0,0,1-1.09-1.23l-12.4-37.46a2.12,2.12,0,0,1-.11-.66V1300a2.07,2.07,0,0,1,.7-1.56l6.75-6.08,18.7-30.88a2.12,2.12,0,0,1,1.55-1l54.54-6.34-18.62-195.83-37.45-58.94a2.15,2.15,0,0,1-.32-1.13V987.09h-18L357.85,1013v7.29Z"/></path>
      <path class="northwest" data-town="Salisbury" data-tooltip="true" title="Salisbury" data-networks="05" d="M574.7,398.84v-36l-21-20.33a2.15,2.15,0,0,1-.61-1.16l-3.43-20.6-9.6-17.14a2.05,2.05,0,0,1-.27-1V225.05a2.1,2.1,0,0,1,.9-1.72l8.22-5.68.66-20.6a2.16,2.16,0,0,1,.61-1.42L561.83,184l1.7-28.89a2.12,2.12,0,0,1,.49-1.22l24-28.75-1-39.8L329.49,94l-6,311.53Z"/></path>
      <polygon class="northwest" data-town="Norfolk" data-tooltip="true" title="Norfolk" data-networks="05" points="922.25 389.54 979.04 78.37 799.41 81.51 750.87 394.13 922.25 389.54"/></polygon>
      <polygon class="northwest" data-town="Colebrook" data-tooltip="true" title="Colebrook" data-networks="05" points="1154.36 254.94 1177.28 111.16 1177.28 74.91 983.31 78.3 947.14 276.47 1154.36 254.94"/></polygon>
      <path class="northwest" data-town="Kent" data-tooltip="true" title="Kent" data-networks="05" d="M357.16,1008.88l179.53-26h18.46V922.62l-40.3-82a2.14,2.14,0,0,1-.21-.93V813.87a2.06,2.06,0,0,1,.25-1l12.26-22.47-6-56.85h-50.5a2.1,2.1,0,0,1-1.84-1.09l-3.59-6.59H317.35L312,1011.75h38.67C353.45,1011.76,356,1006.36,357.16,1008.88Z"/></path>
      <path class="northwest" data-town="North Canaan" data-tooltip="true" title="North Canaan" data-networks="05" d="M592.17,125.82a2.08,2.08,0,0,1-.49,1.39l-24,28.81L566,185a2.11,2.11,0,0,1-.61,1.36L553.72,198l-.24,7.52,221.76,4.3L795.15,81.58l-201,3.52-3,.1Z"/></path>
      <path class="northwest" data-town="Sharon" data-tooltip="true" title="Sharon" data-networks="05" d="M465.52,721.67l88.23-96.51v-90a2.1,2.1,0,0,1,2.1-2.1H561l6.75-52.65a2.08,2.08,0,0,1,.77-1.37l6.19-5V403l-251.28,6.72-6,311.91Z"/></path>
      <path class="northwest" data-town="Litchfield" data-tooltip="true" title="Litchfield" data-networks="05" d="M1113.23,880.18v-2H1081.8a2.11,2.11,0,0,1-1.82-1l-15.54-26.94L1029.07,819a2.12,2.12,0,0,1-.66-1.11l-5.1-22.46-5.86-5.85a2.13,2.13,0,0,1-.61-1.49V759.74a2.11,2.11,0,0,1,.35-1.17l8-12V727.26h-1V725l-65.56-19.83a2.1,2.1,0,0,1-1.49-2V686.4H944.75L700.43,735.26v95.29L716,866.82a2.12,2.12,0,0,1,.17.83v32.61l25.49,23.47V895.59a2.09,2.09,0,0,1,1.94-2.09l222.11-16.76a2.08,2.08,0,0,1,2.17,1.51l32,110.86,113.4-89Z"/></path>
      <path class="northwest" data-town="Thomaston" data-tooltip="true" title="Thomaston" data-networks="05" d="M1141.9,1058.13l-13-16.67a2.08,2.08,0,0,1-.44-1.27c0-1.29-.17-31.54,0-34.37,0-.63,4.24-63.72,6-67.19a.64.64,0,0,0-.08.19c.84-3.09.4-38-.1-60.69h-16.81v23a2.12,2.12,0,0,1-.8,1.65l-114.67,90,13.8,12,17.72,5.17a2,2,0,0,1,.81.45l10.16,9.09,50.59,17.32a2.11,2.11,0,0,1,1.3,1.31l6.06,17.9,40.83,26.6Z"/></path>
      <path class="northwest" data-town="Washington" data-tooltip="true" title="Washington" data-networks="05" d="M559.34,997.65l37.39,58.86a2.07,2.07,0,0,1,.32.93l13.39,140.93,179.19-28.13L778,962.91l-64.66-59.53L559.34,924Z"/></path>
      <path class="northwest" data-town="New Hartford" data-tooltip="true" title="New Hartford" data-networks="05" d="M1127.34,463.6l-7.84,65.89-8.38,80.64-8,53.11,77.2-3.43a7.18,7.18,0,0,1,5.25-5.19l143.64-35.16V598.39a7.22,7.22,0,0,1,4.44-6.64l3.51-28.08h-8.62a7.18,7.18,0,0,1-3.67-1l-19.38-11.52a7.22,7.22,0,0,1-3.52-6.34l2.54-120.25Z"/></path>
      <path class="northwest" data-town="Woodbury" data-tooltip="true" title="Woodbury" data-networks="05" d="M809.48,1368l163.16-26.67-3-40.89h-4.11a7.19,7.19,0,0,1-7.19-7.19v-33.91a7.16,7.16,0,0,1,4.51-6.67l25.57-10.27-10.25-32.57a1.1,1.1,0,0,1-.06-.26l-11.17-62.94L767.52,1178Z"/></path>
      <polygon class="northwest" data-town="Bethlehem " data-tooltip="true" title="Bethlehem " data-networks="05" points="966.21 1142.51 940.33 996.83 784.42 1002.34 793.79 1169.58 966.21 1142.51"/></polygon>
      <polygon class="northwest" data-town="Roxbury" data-tooltip="true" title="Roxbury" data-networks="05" points="656.59 1391.5 804.34 1369.25 763.37 1178.6 610.84 1202.55 615.89 1255.6 656.59 1391.5"/></polygon>
      <path class="northwest" data-town="Bridgewater" data-tooltip="true" title="Bridgewater" data-networks="05" d="M540.18,1294.8a2.28,2.28,0,0,1-.39.48l-6.3,5.66v26.67l12,36.28,15.42,7.31a2.11,2.11,0,0,1,1,1l1.63,3.39c2.06-.32,2.16,5.27,3.75,6.62l12.32,12.3a7.25,7.25,0,0,1,2.06,2.92l6.47,13.36,10.6,10.4h5.59a7.12,7.12,0,0,1,5.6,2.67l10.23,12.68,13.07,4.36a3.16,3.16,0,0,1,.43.16l9.29,3.76a7.22,7.22,0,0,1,2.85,2.09l6.69,8.11,8.39-.07L653,1398.46c-.51-2.83-2.48-6.22-3.36-13.48l-37.31-126.67-53.81,6.25Z"/></path>
      <path class="northwest" data-town="Cornwall" data-tooltip="true" title="Cornwall" data-networks="05" d="M564.91,535.44a2.09,2.09,0,0,1-2.08,1.83h-4.89V626a2,2,0,0,1-.55,1.41L469,724.07l2.88,5.28H523l173.2,2.07V718.88a1.82,1.82,0,0,1,0-.33L746,398.45l-167.1,4.47v72.19a2.06,2.06,0,0,1-.79,1.63l-6.32,5.06Z"/></path>
      <polygon class="northwest" data-town="Goshen" data-tooltip="true" title="Goshen" data-networks="05" points="700.43 719.04 700.43 730.99 865.98 697.88 921.48 393.75 750.22 398.34 700.43 719.04"/></polygon>
      <path class="northwest" data-town="Canaan" data-tooltip="true" title="Canaan" data-networks="05" d="M553.35,209.72l-.3,9.11a2.12,2.12,0,0,1-.9,1.66L544,226.15V302l9.51,17a2,2,0,0,1,.24.68L557.1,340l21.16,20.47a2.1,2.1,0,0,1,.64,1.51v36.77l167.71-4.49L774.6,214Z"/>
      <path class="northwest" data-town="Winchester" data-tooltip="true" title="Winchester" data-networks="05" d="M919.25,429.32l34.2,8.84a2.07,2.07,0,0,1,1.57,2V497.3l168.51-37.15,23.83-200.27-201,20.89Z"/></path>
      <path class="northwest" data-town="Morris" data-tooltip="true" title="Morris" data-networks="05" d="M745.83,897.53v30.06l35.65,32.81a2.1,2.1,0,0,1,.67,1.43l2,36.32,211.74-7.47L964.31,881Z"/>
      <path class="north-central" data-town="Marlborough" data-tooltip="true" title="Marlborough" data-networks="02" d="M2180.49,916a2.1,2.1,0,0,1-1.62,1.9l-40.67,9.49-11.64,44.07.61-.07a7.19,7.19,0,0,1,6.72,3.09l93.81,137h35.7l37.45-17.7,13-17.14-4.22-28.45a7.16,7.16,0,0,1,.73-4.36l9.44-18.26-2.25-17.45-9.24-11.71a7.1,7.1,0,0,1-1.5-3.62L2305,977.42l-34.15-29.6a7.17,7.17,0,0,1-2.48-5.43v-9.74l-47.93-26.58a7.2,7.2,0,0,1-3.71-6.29V873.44H2212a7.16,7.16,0,0,1-6.88-5.09h-21.21Z"/></path>
      <path class="north-central" data-town="Farmington" data-tooltip="true" title="Farmington" data-networks="02" d="M1591.68,733.54V752.4a2.1,2.1,0,0,0,2.1,2.1h25.84v19.55a2.11,2.11,0,0,0,.93,1.75,2.07,2.07,0,0,0,2,.19l11.88-4.89a2.07,2.07,0,0,0,1-.87l8.48-14.34h2.4l3.74,73.34h-17.12a2.09,2.09,0,0,0-1.44.58l-72.72,69.25-129.3-2.65-23-187.4L1426,732.78a2.11,2.11,0,0,0,1.62.76Z"/></path>
      <path class="north-central" data-town="Rocky Hill" data-tooltip="true" title="Rocky Hill" data-networks="02" d="M1754.55,995l6.14,40.62,153.47-40.56,3-56.3a2,2,0,0,1,.38-1.09l9.4-13.43V892l-6.81-10.63L1832,914.5v11.82a2.09,2.09,0,0,1-1.63,2l-57.85,13.25-.93-4.08,2.55,34a2.08,2.08,0,0,1-.51,1.53Z"/></path>
      <path class="north-central" data-town="Berlin" data-tooltip="true" title="Berlin" data-networks="02" d="M1732.67,996.47l-62.4,10.84a2.16,2.16,0,0,1-.36,0,2.06,2.06,0,0,1-1-.25l-8.31-4.51-15.22,4.67a2.1,2.1,0,0,1-.61.09h-40.51l-8.22,6.26a2.07,2.07,0,0,1-1.27.43h-20.23l-8.74,43.74a2.57,2.57,0,0,1-.15.47l-5.17,11.19,9.33,18.92a2.08,2.08,0,0,1-.14,2.1l-10.82,16v22.41a2.09,2.09,0,0,1-.74,1.6l-8.5,7.19-3.36,19.5a2.15,2.15,0,0,1-.15.51l-6.67,14.78v3.9a7.2,7.2,0,0,1,2,.47l27.12,11a7.17,7.17,0,0,1,4.48,6.66v15l4.12-1.23,45.95-45a7.21,7.21,0,0,1,3.7-1.93l42.7-8a7.39,7.39,0,0,1,1.33-.12h14.41v-28a7.2,7.2,0,0,1,5.4-7l25.75-6.64v-5.48a7.19,7.19,0,0,1,5.26-6.93l30.91-8.58v-47.29a7.17,7.17,0,0,1,4.09-6.47l-6.11-40.39Z"/></path>
      <path class="north-central" data-town="Glastonbury" data-tooltip="true" title="Glastonbury" data-networks="02" d="M1873.22,808.45l15.39,13.1H1906a2.1,2.1,0,0,1,1.51.64l8.74,9.08a2.15,2.15,0,0,1,.58,1.46v35.7l14,21.84a2,2,0,0,1,.33,1.13v33.52a2.09,2.09,0,0,1-.38,1.21l-9.43,13.48-2.93,54.69,203.69-22.36,12.38-46.85a2.1,2.1,0,0,1,1.55-1.51l40.4-9.42,3.38-48a2.09,2.09,0,0,1,2.09-2h22.58l-10.1-95-7.13-24L1984.7,773.52Z"/></path>
      <path class="north-central" data-town="Southington" data-tooltip="true" title="Southington" data-networks="02" d="M1357.42,1169l-1.66,1.66v25.41a7.19,7.19,0,0,1-.76,3.22l-5,10v7l46-6.82,81.89-12.06a7.25,7.25,0,0,1,4.43.77l15.07,8a7.16,7.16,0,0,1,3.81,6.34v50.28l11.36,11.35h4.4v-2l-4.08-5.39a7.17,7.17,0,0,1,.22-8.94l22-26.37-6.54-42.5a7.19,7.19,0,0,1,1.13-5.08l3-4.52a7.28,7.28,0,0,1,2.52-2.29V1172a2,2,0,0,1,.19-.86l6.74-15,3.44-20a2.13,2.13,0,0,1,.72-1.25l8.33-7v-22.08a2.12,2.12,0,0,1,.36-1.17l10.5-15.55-9.24-18.72a2.12,2.12,0,0,1,0-1.81l5.49-11.87,8.92-44.66-4.77-15.35-124,17.3-82.37,18.27V1163.9A7.13,7.13,0,0,1,1357.42,1169Z"/></path>
      <path class="north-central" data-town="Avon" data-tooltip="true" title="Avon" data-networks="02" d="M1581.9,622.49V569.32l-212.33,63.8v31.47l35.37,36,.1.15h0l23.5,28.57h163.12V711.44L1582,671.17a2,2,0,0,1-.06-.49V622.49Z"/></path>
      <path class="north-central" data-town="Plainville" data-tooltip="true" title="Plainville" data-networks="02" d="M1429.94,900.61l13.39,109,121.3-16.93-2.14-6.88-9.27-18a2,2,0,0,1-.23-1.1l4.32-63.46Z"/></path>
      <path class="north-central" data-town="Wethersfield" data-tooltip="true" title="Wethersfield" data-networks="02" d="M1856.08,797.5a2.08,2.08,0,0,1-.8.29L1762,810.1l9.57,127.43,56.23-12.88v-11.6a2.1,2.1,0,0,1,1.36-2l88.7-33.32-4.87-7.59a2.16,2.16,0,0,1-.33-1.13V833.57l-7.53-7.83h-17.27a2.09,2.09,0,0,1-1.35-.5l-18.86-16.06a2.09,2.09,0,0,1-.74-1.6V791Z"/></path>
      <path class="north-central" data-town="Burlington" data-tooltip="true" title="Burlington" data-networks="02" d="M1342.7,628.56a7.2,7.2,0,0,1-4.6,3.53L1195.61,667l36.53,191.46,4.31-.67a7.18,7.18,0,0,1,5.46,1.39,7,7,0,0,1,1.92,2.21l172.46-37.52-14.84-120.76L1366,666.91a2.07,2.07,0,0,1-.6-1.47V633.27Z"/></path>
      <path class="northwest" data-town="Hartland" data-tooltip="true" title="Hartland" data-networks="05" d="M1385.81,237.15l10.11-1,38.83-163-252.91,1.67-.2,39.83a7.08,7.08,0,0,1-.09,1.13l-23.43,142.32Z"/></path>
      <path class="north-central" data-town="Enfield" data-tooltip="true" title="Enfield" data-networks="02" d="M1901.8,271.15a2.1,2.1,0,0,1-.09.61l-.5,1.68,163.21-26.31c6.71-1.24,19.89-3.95,22.61-4.75l22.34-4.79L2076.79,49.66,2006.65,53l-59.52,24.34-34-1.52-1.52,14.54V218.07a2.19,2.19,0,0,1-.31,1.11l-9.47,15.2Z"/></path>
      <path class="north-central" data-town="East Granby" data-tooltip="true" title="East Granby" data-networks="02" d="M1716.18,241.35l13.06-19.41-91.59-32.46-39.16,164.26,49.91,3.33a2.09,2.09,0,0,1,1.58.89,2.13,2.13,0,0,1,.29,1.8l-6.73,22.61L1682.87,398l22-61.54.68-18.53a2.1,2.1,0,0,1,2.1-2h14a2.09,2.09,0,0,1,2.08,1.88l.54,5.39,26.64,4.33,6.87-22.69a.74.74,0,0,1,.1-.27l5-10.76V258.6l-.92-.19h-44a2.1,2.1,0,0,1-2.1-2.1V242.52A2.11,2.11,0,0,1,1716.18,241.35Z"/></path>
      <path class="north-central" data-town="East Windsor" data-tooltip="true" title="East Windsor" data-networks="02" d="M1894.82,294.51v83.12l6.14,15.69a2,2,0,0,1,.15.77v48.77l163.23-9.37V251.39L1899.85,277.9Z"/></path>
      <path class="north-central" data-town="Windsor Locks" data-tooltip="true" title="Windsor Locks" data-networks="02" d="M1853.17,278.09,1767,259.51v34.7a2.16,2.16,0,0,1-.19.87l-5.11,11.05-6.88,22.7,53,29.9a2.24,2.24,0,0,1,.51.41L1829,381.51h62.81l-1.07-2.73a2.18,2.18,0,0,1-.14-.76V294.2a2,2,0,0,1,.09-.6l4.68-15.46h-41.79A1.84,1.84,0,0,1,1853.17,278.09Z"/></path>
      <path class="north-central" data-town="Canton" data-tooltip="true" title="Canton" data-networks="02" d="M1384.85,345.59l-15.79,67.93a7.18,7.18,0,0,1-5.75,5.46l-44.48,7.87-2.4,114.07,14.08,8.37h14.79a7.19,7.19,0,0,1,7.19,7.17,6.84,6.84,0,0,1-.06.91l-5.24,41.91a7.18,7.18,0,0,1-3.61,5.38v19.8l23.8,4.95,88.91-26.72L1435.38,348.5Z"/></path>
      <path class="north-central" data-town="Simsbury" data-tooltip="true" title="Simsbury" data-networks="02" d="M1595.73,357.76l-156.12-9,20.78,252.71L1611.77,556V510a1.61,1.61,0,0,1,0-.31l10.64-71.05a1.27,1.27,0,0,1,.06-.28l23-77.31-49.77-3.32Z"/></path>
      <path class="north-central" data-town="Granby" data-tooltip="true" title="Granby" data-networks="02" d="M1408.63,247.89l-22.82,93.52,208.43,12L1633.68,188l-28-9.93a2.09,2.09,0,0,1-1.34-2.44l6.66-29.77L1525.69,156l0-87.16-71.77,2.82-39.37,155.45Z"/></path>
      <path class="north-central" data-town="Suffield" data-tooltip="true" title="Suffield" data-networks="01" d="M1733.19,218.89a2.07,2.07,0,0,1,1.29,1.32,2.1,2.1,0,0,1-.25,1.82L1720,243.16v11.06h42.1a1.62,1.62,0,0,1,.44,0L1853.83,274h42.84l.94-3.11v-37a2.08,2.08,0,0,1,.32-1.11l9.46-15.21V90l1.5-14.39-265.3-11.8-23,52.29v28.66l-5.19.62-6.58,29.4Z"/></path>
      <path class="north-central" data-town="New Britain" data-tooltip="true" title="New Britain" data-networks="02" d="M1633.73,833.42l-72.14,68.71-4.38,64.26L1566.3,984a1.43,1.43,0,0,1,.14.34l7.93,25.5h19.7l8.22-6.26a2.07,2.07,0,0,1,1.27-.43h40.89l14.21-4.36-8.44-165.37Z"/></path>
      <path class="north-central" data-town="Newington" data-tooltip="true" title="Newington" data-networks="02" d="M1662.86,999l7.41,4,61.86-10.75h19.25L1769.86,971l-12.07-160.63h-10.6l-93.91.69Z"/></path>
      <path class="north-central" data-town="Hartford" data-tooltip="true" title="Hartford" data-networks="02" d="M1783,624l-6-5.56-16.54,6a2.33,2.33,0,0,1-.51.11l-25.2,2.45,14.36,179.19h10.49l94.7-12.49,12.58-7.55V758.61l-28.3-43.48a2.11,2.11,0,0,1-.34-1.14V696.35a2.2,2.2,0,0,1,.27-1L1866.88,645V612.08l-82.11,12.48A2.1,2.1,0,0,1,1783,624Z"/></path>
      <path class="north-central" data-town="East Hartford" data-tooltip="true" title="East Hartford" data-networks="02" d="M1871.07,630.36v15.18a2,2,0,0,1-.27,1l-28.37,50.34v16.46l28.3,43.49a2.11,2.11,0,0,1,.34,1.14v46.74L1981.89,770l-20.43-142.79Z"/></path>
      <path class="north-central" data-town="Manchester" data-tooltip="true" title="Manchester" data-networks="02" d="M2088,564.39,1965.56,626.3,1986,769.15l200.59-28.08V707.16l-29.91-124.28h-62.09a7.2,7.2,0,0,1-7.19-7.21c0-.12,0-.24,0-.36Z"/></path>
      <path class="north-central" data-town="Bristol" data-tooltip="true" title="Bristol" data-networks="02" d="M1265.15,1042.25l85.75-17.51a7.14,7.14,0,0,1,7.66,3.45l80.64-17.89L1416.8,828l-171.94,37.41Z"/></path>
      <path class="north-central" data-town="Bloomfield" data-tooltip="true" title="Bloomfield" data-networks="02" d="M1626.56,439.44,1616,510.19v47.34a2.08,2.08,0,0,1-1.49,2l-28.37,8.53v54.81l48-3.17,91.45-8.38a2.1,2.1,0,0,1,2,1l6,10.53,25.63-2.47,17.49-6.33a2.1,2.1,0,0,1,2.13.43l6.25,5.74.58-.08-12.31-143.32L1677.27,441a2.1,2.1,0,0,1-1.34-2.24l4.48-33.72a2.07,2.07,0,0,1,.1-.43l1-2.66-39.12-15.5Z"/></path>
      <path class="north-central" data-town="West Hartford" data-tooltip="true" title="West Hartford" data-networks="02" d="M1586.1,670.43l9.71,40.27a2,2,0,0,1,.06.49v39.12h25.85a2.1,2.1,0,0,1,2.09,2.09v18.53l8.33-3.44,8.73-14.76a2.12,2.12,0,0,1,1.8-1h5.59a2.09,2.09,0,0,1,2.09,2l2.71,53.19,91.85-.68-14.47-180.46-5.8-10.12-90.16,8.25-48.38,3.2Z"/></path>
      <path class="north-central" data-town="Windsor" data-tooltip="true" title="Windsor" data-networks="01" data-networks="02" d="M1892.72,385.7h-64.6a2.1,2.1,0,0,1-1.54-.67l-21.08-22.81-53.87-30.38L1722,327a2.1,2.1,0,0,1-1.75-1.86l-.51-5.1h-10l-.63,16.84a2.2,2.2,0,0,1-.12.63l-24.37,68.24-4.23,31.85,95.81,35.79a2.09,2.09,0,0,1,1.36,1.78L1790,619.53l77-11.7V574.29a1.85,1.85,0,0,1,0-.47l9-39.12a1.77,1.77,0,0,1,.23-.59l20.67-34.78V394.48l-4.2-10.71Z"/></path>
       <path class="north-central" data-town="South Windsor" data-tooltip="true" title="South Windsor" data-networks="02" d="M1901.11,447.05V499.9a2.1,2.1,0,0,1-.3,1.07L1880,536l-9,38.56V626.2l91.67-3.14,125.49-63.46,4.36-82.86h-21.06a7.2,7.2,0,0,1-7.19-7.19V437.69Z"/></path>
      <path class="northeast" data-town="Coventry" data-tooltip="true" title="Coventry" data-networks="04" d="M2454.82,498.32l-159.77,35.95,6.24,43.21,13.43,72.41,99.41,0a2.1,2.1,0,0,1,1.79,1l34.22,67.6a2.1,2.1,0,0,1,.05,2.1l-10.88,19.94,30.75,0a2.11,2.11,0,0,1,.86.18l44.94,20.11,61-2.68V742.62a7.1,7.1,0,0,1,.51-2.62l-36.7-29.09a2.1,2.1,0,0,1-.79-1.64v-44.8l-72.14-83.92a2.14,2.14,0,0,1-.5-1.37v-36l-13.92-39.51a2.16,2.16,0,0,1,0-1.42Z"/></path>
      <path class="northeast" data-town="Willington" data-tooltip="true" title="Willington" data-networks="04" d="M2575.42,226.8a2.09,2.09,0,0,1-2,2.09l-116,7.59v41.1l20.75,36.54a2,2,0,0,1,.26.87l2.1,25.84a2,2,0,0,1-.14.93l-18.71,47.83v63.7l4.28,4.27a2.09,2.09,0,0,1,.61,1.55l-.7,20.92a2.09,2.09,0,0,1-.13.66l-4.59,12.54,170.31-10L2618,191.53h-42.6Z"/></path>
      <path class="north-central" data-town="Ellington" data-tooltip="true" title="Ellington" data-networks="01" d="M2069,250.63V466.51a4.37,4.37,0,0,0,4.63,4.36l17,0a5.1,5.1,0,0,0,4.77-4.54l3.74-35.32a2.11,2.11,0,0,1,1.8-2l155.78-22.36L2243.08,312a2.08,2.08,0,0,1,1.74-2.36l199.41-33.25v-39.6L2269,248.8h-.14a2.11,2.11,0,0,1-1.43-.56,2.07,2.07,0,0,1-.67-1.53V217l-149.07,23.52c-4.29,1.38-9.06,1.79-11.74,2.57Z"/></path>
      <path class="north-central" data-town="Hebron" data-tooltip="true" title="Hebron" data-networks="02" d="M2412.46,926.48l-44.41-89L2311.22,848a2.09,2.09,0,0,1-1.85-.53L2296.06,835a2.24,2.24,0,0,1-.43-.58l-32.14-63.5-63.26,2.77,9.87,87.53,1.47,5.5c4,0,7.44,1.63,11.23,1.69l.06,31.44,47.91,26.54a7.24,7.24,0,0,1,3.7,6.29l-.07,9.49,33.79,29.28c1.39,1.17,2.29,1.86,2.52,3.66l1.86,16.12,9.21,11.67a7.17,7.17,0,0,1,1.49,3.54l1.58,18.14a7.13,7.13,0,0,1-.75,4.23l-9.41,18.19,4.53,26.27,28.42,8.78H2359l12.59-21.81a7.21,7.21,0,0,1,6.23-3.6h16.24a7.2,7.2,0,0,1,7.19,7.07h23.52l36.73-13.1,6.45-18.25-52.48-99Z"/></path>
      <path class="north-central" data-town="Andover" data-tooltip="true" title="Andover" data-networks="02" d="M2400.44,665.79h-101a2.38,2.38,0,0,1-.37.66,2.09,2.09,0,0,1-1.6.74h-9V767.77a2.09,2.09,0,0,1-2,2.09l-18.36.81,31.12,61.48,12.25,11.58,60.84-12.17,61.12-111.93Z"/></path>
      <path class="north-central" data-town="Bolton" data-tooltip="true" title="Bolton" data-networks="02" d="M2167.06,600.28l25.11,104.34a7.28,7.28,0,0,1,.2,1.68v34.58l7.38,24.84a6.37,6.37,0,0,1,.26,1.3l.22,2.09,84-3.35V665.09a2.1,2.1,0,0,1,2.09-2.09h8.69l-13.21-82.76Z"/></path>
      <path class="northeast" data-town="Columbia" data-tooltip="true" title="Columbia" data-networks="04" d="M2515.46,765a2.1,2.1,0,0,1-.85-.19l-45-20.13h-32.34l-51.85,96.17,40.95,82.06a5,5,0,0,1,.54-.08l60.27-6.09,57.52-45.31a7.32,7.32,0,0,1,4.45-1.54h11.32V867l-7-22.71a7.15,7.15,0,0,1,2.27-7.65l33.73-28.06v-5.7a7.17,7.17,0,0,1,1.84-4.81l10.33-11.48-.53-3.81-21.52-17.25a7.16,7.16,0,0,1-2.29-3.21L2515.55,765Z"/></path>
      <path class="northeast" data-town="Union" data-tooltip="true" title="Union" data-networks="04" d="M2575.42,187.34h42.83c11.07-3,6.27,3.73,9.28,3.55l199.08-10.76L2810.45,18.32l-186.26,6.61-48.77,134.14Z"/></path>
      <polygon class="north-central" data-town="Somers" data-tooltip="true" title="Somers" data-networks="02" points="2266.8 212.75 2266.8 40.59 2081.53 49.39 2114.21 236.4 2266.8 212.75"/></polygon>
      <path class="north-central" data-town="Stafford" data-tooltip="true" title="Stafford" data-networks="01" d="M2271,214.58v29.89l172.94-11.31.29-14,114.57-8.3V158.7a2.22,2.22,0,0,1,.12-.72l48.32-132.89-102.56,4.2L2271,40.39Z"/></path>
      <path class="north-central" data-town="Vernon" data-tooltip="true" title="Vernon" data-networks="02" d="M2104,437l-2.38,25.8c-1.14,4.77-.79,12.08-4.61,13l-4.2,97.85a4.45,4.45,0,0,0,4.51,4.74l57.38-.77c3.33,0,7.41,2.08,8.18,5.32l3,13.53,115.32-20.32-23.86-165.27L2107.75,433A4.39,4.39,0,0,0,2104,437Z"/></path>
      <path class="northeast" data-town="Mansfield" data-tooltip="true" title="Mansfield" data-networks="04" d="M2457.55,503l13.79,39.13a2.06,2.06,0,0,1,.12.7V578.4l72.13,83.93a2.09,2.09,0,0,1,.51,1.37v44.56L2582,736.47c1.2-.83,1.31,4,2.78,4l93.81.12,9-13.35-.51-22a7.08,7.08,0,0,1,.8-3.29l12.22-23.71a7.16,7.16,0,0,1,6.39-3.9l30.47.46-7.89-183.18-.85-7.48c-3,0-87.28,2.82-96.18,3.27l-172.43,10.14Z"/></path>
      <path class="north-central" data-town="Tolland" data-tooltip="true" title="Tolland" data-networks="02" d="M2247.52,313.41l31.28,205.1,168.71-36.43,5.18-14.13-.34-11.07-4.25-4.25a2.11,2.11,0,0,1-.61-1.48l-1-61.95a2.28,2.28,0,0,1,.14-.77l20.68-47.74-2-24.9-20.07-35.35Z"/></path>
      <path class="northeast" data-town="Lisbon" data-tooltip="true" title="Lisbon" data-networks="04" d="M2981.72,1030.34v89.89l5.58,10.61,11.55,2.2,21.25-2.06,10-8.61,12.27-26.08c.09-.19,2-3.14,2.16-3.3l5.43-2a2.09,2.09,0,0,1,1.55-.69h6.28a2.11,2.11,0,0,1,1.86,1.12l3.8,7.17,2.28-1,4.59-8.26-2.13-15a2.15,2.15,0,0,1,.11-.87l2.1-6.07v-84a2,2,0,0,1,.28-1l17-29.37V937.85a2,2,0,0,1,.38-1.19l4.87-7.07-104.78-15.67v32.83a2.08,2.08,0,0,1-.15.78l-8.23,20.58v46.22a2.09,2.09,0,0,1-.82,1.66l1.86,3Z"/></path>
      <path class="southeast" data-town="New London" data-tooltip="true" title="New London" data-networks="06" d="M2913.83,1725.68l13-1.37.7-17.54,5.73-5,.89-8.92-21.8-28,10.24-13.1.55-47.21-2-15.81-6.18-50.9-31.47,5.51-18.12,8.05-21.78,29.42v37h7.33a2.09,2.09,0,0,1,1.37.51l30.91,26.79a2.07,2.07,0,0,1,.72,1.56l.52,49,7.68,17.15a2.21,2.21,0,0,1,.17.57l3.35,24.51,2.41-1.48,6.93.34Z"/></path>
      <path class="southeast" data-town="Waterford" data-tooltip="true" title="Waterford" data-networks="06" d="M2888.16,1714.26l-7.74-17.28a2,2,0,0,1-.18-.83l-.52-48.49-29.6-25.66h-8.65a2.1,2.1,0,0,1-2.09-2.09h0v-39.78a2.08,2.08,0,0,1,.41-1.25l22.52-30.42a2.19,2.19,0,0,1,.84-.67l18.86-8.38a2.13,2.13,0,0,1,.49-.15l31.94-5.59-11.91-98.25-17.06,3.69-197.71,57.66,55.77,86.62a2.19,2.19,0,0,1,.33,1.14v26.2l14.85,27.56a2.07,2.07,0,0,1,.26,1v30.21l5.61,7.57a2.15,2.15,0,0,1,.41,1.25V1702l11.51,11.84h8.62l-5.71,16.2,18.28,1-1.52,5,4.86.31,1-19.94,20.44-13.77,10.5,8.75-5.06,8.27V1736l5.8,3.86,21-.38,7.51,6.79,13.3-4.31,8.28,3.23,7.89-4.86Z"/></path>
      <path class="southeast" data-town="North Stonington" data-tooltip="true" title="North Stonington" data-networks="06" d="M3429.55,1435.28l6.44,1.33-5.21-211-179.38-24.84L3127.29,1187l42.55,138.91a2.16,2.16,0,0,1,.09.62v50.77l16.92,12a2.12,2.12,0,0,1,.82,1.17l11.72,43.83,168.87,38.7v-11l20.74-13.3,11.2-19.31L3418,1425Z"/></path>
      <path class="south-central" data-town="Lyme" data-tooltip="true" title="Lyme" data-networks="03" d="M2527,1429l-229.76,54.07,0,18.89,58.15,70.59,15.64,3.26a7.17,7.17,0,0,1,4,2.38l17.36,19.5a7.32,7.32,0,0,1,1.1,1.76l5.95,13.54,10.18,19.12,19.78,19.66,1.46,1,158.6-47.5-24.47-80.1a2,2,0,0,1-.08-.8l8.87-95.35-37.26.61"/></path>
      <polygon class="south-central" data-town="Old Lyme" data-tooltip="true" title="Old Lyme" data-networks="03" points="2590.7 1609.33 2432.68 1656.6 2444.76 1687.69 2465.79 1709.77 2466.68 1744.75 2491.3 1772.2 2496.93 1786.27 2497.52 1796.47 2501.73 1795.59 2506.15 1786.75 2514.68 1793.73 2511.74 1805.11 2523.55 1812.27 2524.22 1818.99 2527.34 1819.48 2533.49 1811.52 2562.93 1810.38 2569.64 1803.67 2580.56 1808.74 2583.1 1807.05 2587.7 1799.1 2614.07 1797.59 2619.89 1787.4 2630.81 1800.13 2637.99 1800.13 2639.7 1781.74 2640.63 1773.04 2590.7 1609.33"/></polygon>
      <path class="southeast" data-town="Groton" data-tooltip="true" title="Groton" data-networks="06" d="M3134.79,1538l8.69-5.31,6-24.9-234.42-3.92,10.22,84.38,4.22,33.21,16.14,45.21,15.11,27.41,6.07-.72,6,7.6,4.53.86,5.93-12.47c.08-1.13.29-3.81.52-6.49.7-7.88.84-9.52,3.62-9.76a3.1,3.1,0,0,1,3.22,2.37c.34,1.06,4,9.44,7.59,17.45l13.52-1.62-2.8-16.44,26.78-19.39,5,16.63-9.31,15.12v19.7l6-1,2.59-4.77,11.6-15.11-2.9-13.76,2.82-8.48H3066l1.76,11.86,5.66,6.47-3.76,19.55,10,10.87,7.57-3.35-6.68-10-2.79-18.65,12-2,5.6,12.41,7.11,1.55.65-14.44,6.94-5.2-5.56-16.7,24-7.3.61,15.35,4.54-5,2.28-36.76,6.33-5.49-2.13-31.66-6.21-19.67a2.24,2.24,0,0,1-.1-.63v-25.14A2.08,2.08,0,0,1,3134.79,1538Z"/></path>
      <path class="southeast" data-town="Norwich" data-tooltip="true" title="Norwich" data-networks="06" d="M2922.19,1224a2.11,2.11,0,0,1,1.19-1.5l25.2-11.31,22.81-28.89v-37a2.06,2.06,0,0,1,.56-1.42l5.56-6-6.17-7.5a2.07,2.07,0,0,1-.48-1.33l2.28-92.34-1.89-11.07-22.72-13.51h-16.39l-53.75,17.92-38.86,100-8.27,2.93-10.8,59.83a2,2,0,0,1-.44,1l-6.53,7.93,23.07,54.65h37.9a1.79,1.79,0,0,1,.51.07l38.85,9.92v-.14a2,2,0,0,1,0-.84Z"/></path>
      <path class="southeast" data-town="Preston" data-tooltip="true" title="Preston" data-networks="06" d="M3124.58,1182.5l120,13.33-119.88-94h-50.95l-4.64,8.35a2.13,2.13,0,0,1-1,.9l-4.72,2.1a2.08,2.08,0,0,1-2.7-.94l-4.13-7.79h-4.09l-4.41,4.85-12.44,26.43a2.08,2.08,0,0,1-.92,1l-11,5.76a2.25,2.25,0,0,1-.8.24l-30.9,2.62a2.23,2.23,0,0,1-1.05-.19l-10.15-4.61-5.22,5.63V1183a2.11,2.11,0,0,1-.45,1.3l-23.57,29.86a2.16,2.16,0,0,1-.79.61l-24.69,11.09-8.08,39.91,18.44,90.74,52.74-61.2a2.09,2.09,0,0,1,1.65-.73l166.49,4.77-35-114.16a2.1,2.1,0,0,1,1.37-2.62,2.27,2.27,0,0,1,.86-.08Z"/></path>
      <polygon class="northeast" data-town="Voluntown" data-tooltip="true" title="Voluntown" data-networks="04" points="3430.67 1208.41 3422.8 902.73 3293.7 907.99 3243.82 917.65 3243.82 941.25 3310.5 1191.76 3430.67 1208.41"/></polygon>
      <path class="northeast" data-town="Griswold" data-tooltip="true" title="Griswold" data-networks="04" d="M3306,1191.14,3239.69,942a2.24,2.24,0,0,1-.06-.52v-23L3150,935.83a7.74,7.74,0,0,1-1.36.13h-12.58a7.56,7.56,0,0,1-1.06-.08l-37.44-5.6-5.68,8.22v15.06a2,2,0,0,1-.28,1.05l-17,29.37v83.78a2,2,0,0,1-.12.69l-2,5.86,2,10.31h51a2.09,2.09,0,0,1,1.29.45l125.81,98.66Z"/></path>
      <path class="southeast" data-town="Lebanon" data-tooltip="true" title="Lebanon" data-networks="06" d="M2749.9,925a7.87,7.87,0,0,1-.68-.6L2616.36,789.85a7.17,7.17,0,0,1-1.78,3.86l-10.73,11.92V812a7.18,7.18,0,0,1-2.59,5.52l-32.64,27.15,5.92,19.16a7.26,7.26,0,0,1,.32,2.12v11.18a7.2,7.2,0,0,1-7.19,7.19h-16l-57.23,45.08a7.21,7.21,0,0,1-3.79,1.51l-57.36,5.3,48.9,92.25a7.17,7.17,0,0,1,.43,5.77l-.71,2,8.45,11.67h17.44a2.09,2.09,0,0,1,1.57.7l133.9,151.4Z"/></path>
      <path class="southeast" data-town="Bozrah" data-tooltip="true" title="Bozrah" data-networks="06" d="M2697.51,1254.26l21.51-4.16a2.07,2.07,0,0,1,1.25.15l46.42,20.86,11.82,2.46,53.84-16.45-23.19-55a2.12,2.12,0,0,1,.31-2.15l7-8.48,11.54-64-15.16-23L2702,1060.12l-55.93,144.24v43.08l27,7.85Z"/></path>
      <path class="southeast" data-town="Colchester" data-tooltip="true" title="Colchester" data-networks="06" d="M2506.83,1052.05h-17.56a2.16,2.16,0,0,1-1.7-.87l-7.38-10.19-6.23,17.64a7.14,7.14,0,0,1-4.37,4.38l-41.12,14.67a7.07,7.07,0,0,1-2.41.42h-32a7.19,7.19,0,0,1-7.19-7.08H2382l-12.59,21.82a7.23,7.23,0,0,1-6.23,3.59h-17a7.21,7.21,0,0,1-2.75-.54l-20.67-8.54-12.49,16.53a7.26,7.26,0,0,1-2.66,2.16l-40.52,19.15a7.25,7.25,0,0,1-3.07.69h-29.55l52.64,107,137.58-32.83a8.69,8.69,0,0,1,1.23-.18l51.07-3.12a7.21,7.21,0,0,1,7.58,6.34l3.85,32.69,151.64-33.15Z"/></path>
      <path class="southeast" data-town="East Lyme" data-tooltip="true" title="East Lyme" data-networks="06" d="M2755.19,1671.44a2.06,2.06,0,0,1-.42-1.24v-30.38l-14.85-27.56a2.06,2.06,0,0,1-.25-1v-26.12l-56.1-87.15-.76.22-.75-2.56-50-77.75-16.21,10.77a2.08,2.08,0,0,1-1.16.35H2588l-8.87,95.33,75.07,246.15,16.37-12.11,10.67,3.92,6-6.89,2.61-13.07-5.42-8.13,11.54-8.5,12.12,12.12v17.77l9.8,10.55v13.35l-2.92,2.92,5.57,3H2729l1.23-6.86-3.12-4.52-1.53-14.83L2722,1753l4.14-6.62-.68-4.77,2.43-9.71-10.22-13.33,24.67-9.59,7.41.35,11.05-8.84V1679Z"/></path>
      <path class="southeast" data-town="Stonington" data-tooltip="true" title="Stonington" data-networks="06" d="M3157.32,1635.11l12.74,6,4,8.31,4-.73,2.08-10,14.58,3.15,8.37-17.62,17.88,26h14.67l.24-20.06,8.33-2.6,10.49,17.18,1.07,4,15.16-4.45,26-26.24,12,19,4.85-1.8,1.08-7.27,8.85-1.15,8.5,3.74,2.3,12.3,4.62,2.82,2.31,19.18.63-.11,7.47-6.16,3.49-8.54,15.59-9.07v-3.41l13.94-7.91v-10.31c0-.84,0-2,5.65-10.34v-2.5l-16.2-4.9V1570.9l-6.1-3.48,9.74-22.43,12.56-26.61v-16.53l-20-19.59v-5l-171-39.24a1.74,1.74,0,0,1-.45-.17l-29.07,27.42a1.76,1.76,0,0,1-.3.24l-8.11,5.24-5.1,35.21v.18l-6.81,28.29a2.09,2.09,0,0,1-.95,1.3l-8.42,5.15v23.65l6.18,19.6a2.66,2.66,0,0,1,.1.49l2.14,31.94,11.28,8.77Z"/></path>
      <path class="southeast" data-town="Montville" data-tooltip="true" title="Montville" data-networks="06" d="M2884.37,1435.07h.14l18.33-4,30.22-70.18-18.3-90-40.55-10.36H2835.5l-56.28,17.2a2.11,2.11,0,0,1-1,0l-12.57-2.62a1.66,1.66,0,0,1-.43-.14l-46-20.68-21,4.07h-.3l-25,1a2.16,2.16,0,0,1-.67-.08l-28.53-8.3h-3.54v5.2l22.58,28.06a2.11,2.11,0,0,1,.47,1.32V1396a2.1,2.1,0,0,1-.94,1.75l-26.75,17.79,49.9,77.51Z"/></path>
      <path class="southeast" data-town="Salem" data-tooltip="true" title="Salem" data-networks="06" d="M2659,1394.92v-108.5l-22.59-28.06a2.07,2.07,0,0,1-.46-1.31v-8a2.1,2.1,0,0,1,2.09-2.1h3.84V1206.6l-153,33.44,6.89,58.55,36.16,117.7,44.41-.73,13.67-1.21-1.34,10.49H2614Z"/></path>
      <path class="southeast" data-town="Ledyard" data-tooltip="true" title="Ledyard" data-networks="06" d="M3155.28,1469.26a2.11,2.11,0,0,1,.94-1.46l8.74-5.66,30-28.28-11.13-41.61-17.19-12.13a2.08,2.08,0,0,1-.89-1.71v-51.55l-7.13-23.26-166.9-4.79L2937,1362.24l-30.56,71,8.06,66.44,235.77,3.94Z"/></path>
      <path class="northeast" data-town="Franklin" data-tooltip="true" title="Franklin" data-networks="04" d="M2774.51,909.79l-55,135.38,100.94,44.18a2,2,0,0,1,1,.8l13.18,20,33.48-88.56L2829,892.35a2,2,0,0,1-.08-.43l-.15-1.84-46.11-6.9-13.15,24.28Z"/></path>
      <path class="northeast" data-town="Sprague" data-tooltip="true" title="Sprague" data-networks="04" d="M2956.45,1000l18.1,12.93,1-.79,0-44.42a2.08,2.08,0,0,1,.15-.78l8.23-20.58V913.29L2833,890.71l.06.64,38.6,127.64,53-17.65c.21-.07,5.26-1.83,5.49-1.83Z"/></path>
      <path class="northwest" data-town="Brookfield" data-tooltip="true" title="Brookfield" data-networks="05" d="M661.38,1472.7a7.17,7.17,0,0,1-1.69-4.62v-5.48l-9.63-2.06a7.17,7.17,0,0,1-4-2.46l-7.13-8.63-7.39-3-14.86-5a7.24,7.24,0,0,1-3.32-2.31L604,1427.5h-5.11a7.1,7.1,0,0,1-5-2.06L580,1411.93a7.25,7.25,0,0,1-1.68-2.58L573,1395.26l-8.39-7.12-78.95,39.47a7.38,7.38,0,0,1-3,.67l-.44,1.43,47.49,140.43h69.48Z"/></path>
      <path class="northwest" data-town="Bethel" data-tooltip="true" title="Bethel" data-networks="05" d="M544.83,1643.47l-3.13,1.76v19.2a2.1,2.1,0,0,1-1,1.77l-53.14,33.72,27.53,90.74,143.33-44-80.89-172.3h-34v15.45a2.08,2.08,0,0,1-.86,1.69l-3.07,2.26v13.35l6.22,24.87a2.22,2.22,0,0,1,.06.51v9.18A2.12,2.12,0,0,1,544.83,1643.47Z"/></path>
      <path class="southwest" data-town="Trumbull" data-tooltip="true" title="Trumbull" data-networks="01" d="M942.45,2026.42a2.11,2.11,0,0,1,1.91,1.22l5.2,11.35h40.53l17.32-24.25v-49.61l-11.74-8.8a2.12,2.12,0,0,1-.83-1.68v-16.76H976.5a2.11,2.11,0,0,1-1.57-.72l-63.42-72.34-122,15.1-4.09,25.39,73.25,87.27a2.15,2.15,0,0,1,.49,1.35v32.48Z"/></path>
      <path class="southwest" data-town="Bridgeport" data-tooltip="true" title="Bridgeport" data-networks="01" d="M1000.07,2109.35l-10.68-66.17H948.21a2.09,2.09,0,0,1-1.9-1.22l-5.2-11.35H860.83L907,2104.94a2.07,2.07,0,0,1,.3,1.31l-5.76,58.15a2.1,2.1,0,0,1-1.12,1.65l-11.9,6.17,13.12,16.7,34.1-18.11,1.36,18.27,4.33-.54,26.46-14.83-6.77-20.31,16.14-4,8,10.92v1.25l14.71-28.24Z"/></path>
      <path class="southwest" data-town="Stratford" data-tooltip="true" title="Stratford" data-networks="01" d="M1099.76,2194.93l9,.7,1.25-1.33-20.5-15.81,11.55-16.23-.47-4.14-25.53-20v-10.88l15.35-28.16-1.76-47.18,2.78-5.41.75-20.41-.38-5.51,10.18-16.35,16-32.67-14-6.89c-.45-.05-12.7-7.83-13-8.14l-14-12.76-65.3,21.8v49.86a2.1,2.1,0,0,1-.39,1.21l-17.83,25,10.86,67.25a1.93,1.93,0,0,1,0,.34v24.62a2.17,2.17,0,0,1-.24,1L986.71,2168l9.84-.77,34.94,34.44,31.57,4.78,17.62-4.83Z"/></path>
      <path class="southwest" data-town="Stamford" data-tooltip="true" title="Stamford" data-networks="01" d="M399.8,2470.63l-3.55-14.18-28.48-32.89a2.09,2.09,0,0,1-.51-1.37v-56.56L359,2335.52a2.1,2.1,0,0,1,.57-2.06l14.49-14-87.35-138.24-118.3,78.45,139.36,213.51a2.11,2.11,0,0,1,.27.59l4.61,16.9,9.19,12.26a2.14,2.14,0,0,1,.4,1l2.95,22.61,4.57-1,.69-12,3.86-3.86L329,2498l5.56-5.56,17.75,7.89-2.26,9,2,.87,2.42-4.41-.45-19,13.62,3.72,6.11,15.5-6.93,8.16-1.56,21.12,3.86-.36,14.31-11.64-.2-3.72-7.71-3.09.93-26.47h10.87l13.31,4,1.76,6.34h.1c1.25-.75,2.45-1.56,3.62-2.43V2479h0l-5.92-7.61A2.11,2.11,0,0,1,399.8,2470.63Z"/></path>
      <path class="southwest" data-town="Darien" data-tooltip="true" title="Darien" data-networks="01" d="M454.84,2321.87H377.53l-14.21,13.74,8.05,29.18a2.1,2.1,0,0,1,.08.56v56.06l28.3,32.67a2.07,2.07,0,0,1,.45.87l3.56,14.23,6.68,8.6,5.31-1.51,9.82-6.09,6.77,8.54,8-7.74v-14.67l9.6-.8,5.67,16.54-3.35,7.18,8-7.11,3-11.21,2.89-2.89,1.53-10,11.65-9.62,4.69,4.69V2453h1.17l3-6.07,11.36-5.21,10.82,5.85L496.78,2370Z"/></path>
      <path class="northwest" data-town="Ridgefield" data-tooltip="true" title="Ridgefield" data-networks="05" d="M490.61,1945.79l-20.85-32.41a2,2,0,0,1-.27-.58L423.31,1753H393.45a2.11,2.11,0,0,1-1.63-.78l-34.47-42.7h-58.9l-3.55,184.66,86,123.63,67.6-30.07Z"/></path>
      <path class="south-central" data-town="Shelton" data-tooltip="true" title="Shelton" data-networks="03" d="M1018.91,1948.67l60.23-21.11a2.08,2.08,0,0,1,2.13.45l25.68,24.14,26.17,10.51,6.62-18,.06-1.5c.43-10,1.72-40.52,2.14-49.52.5-10.74,9.57-19.52,16.2-25.93a62,62,0,0,0,4.66-4.79c.78-1.3.8-8-.91-15.76-5.7-6.36-38.24-42.1-57.23-50-15.34-6.41-25.71-18-35.74-29.18-6-6.67-11.59-12.94-17.69-17.34-18.25-13.15-30.61-39.48-30.61-45.27a162.59,162.59,0,0,0-1.32-16.49L991.55,1707v41.3c0,.38.28,5.6.09,5.93l-66.72,107.43,55.82,63.68,26.67-.58c1.16,0,.9,8.35.9,9.51v17.81Z"/></path>
      <path class="southwest" data-town="Easton" data-tooltip="true" title="Easton" data-networks="01" d="M798.92,2052.83l16,16.45.76-.5v-10.41a2.12,2.12,0,0,1,.42-1.26l26.2-34.58a2.1,2.1,0,0,1,1.67-.83h8.9a2.1,2.1,0,0,1,1.57.71l.53.59v-28.3l-73.38-87.42a2.09,2.09,0,0,1-.46-1.68L794,1825.93l-66.55-32.79-1.17.82-1.53-2.15-.53-.27L702.7,1809l32.63,59.66a2.08,2.08,0,0,1-.81,2.83s5.25,8.94,5.23,9L624.54,1935.3l92.2,111.24a2.1,2.1,0,0,1,.36,2l-6.38,18.31,51.67,2.44,23.42-27.51a2.09,2.09,0,0,1,2.36-.59l12.05,4.71a2.09,2.09,0,0,1,1.14,2.73c0,.09-.09.18-.14.27Z"/></path>
      <path class="southwest" data-town="Monroe" data-tooltip="true" title="Monroe" data-networks="01" d="M790.21,1875.62l122.15-15.12,65.71-111.25v-41.86c0-.71.45-6.1,1-6.49l30.26-20.55c-.51-3.65-3.18-7.19-4.28-10.71-1.86-5.45-15.5-17.1-28.87-27.51-3.46-1.74-17.91-6.4-27.58-11.46a23.9,23.9,0,0,1-3.18-2l-16.91,5.59-23.49,31.93v27.08a2.06,2.06,0,0,1-.65,1.51l-17.61,16.77a2.1,2.1,0,0,1-1.45.57H868.06a2.11,2.11,0,0,1-1.85-1.11l-4.12-7.79h-7.51L731.33,1790.4l65.89,32.47a2.09,2.09,0,0,1,1.14,2.22Z"/></path>
      <path class="southwest" data-town="Weston" data-tooltip="true" title="Weston" data-networks="01" d="M625.76,2143.23l9.79,16.78,53.66-42.13,16.57-49.69a2,2,0,0,1,.1-.21l6.85-19.67-92-111-96.6,50.86,101.57,155h0Z"/></path>
      <path class="northwest" data-town="Redding" data-tooltip="true" title="Redding" data-networks="05" d="M526.8,1965.63l195.39-93-32.5-59.42h0l-.06-.11-29.38-62.59L446,1816.28l27.46,95,20.91,31.53,13.09-6Z"/></path>
      <path class="northwest" data-town="Newtown" data-tooltip="true" title="Newtown" data-networks="05" d="M717.74,1773.07l2.12,1,125.66-88.88a2.09,2.09,0,0,1,1.21-.38h9.43a2.08,2.08,0,0,1,1.85,1.11l4.12,7.79h15.19l16.36-15.56v-26.87a2.12,2.12,0,0,1,.41-1.24l24.29-33a2.07,2.07,0,0,1,1-.75l20.8-7.23c-8.34-8.37-5.19-8.18-7.37-13.4l-15.43-20.92L901,1571.27a7.5,7.5,0,0,1-2-1l-25.8-17.1H857a7.16,7.16,0,0,1-5.54-2.61l-9.82-8-11.19-3-13.78,8.29a7.18,7.18,0,0,1-5.14.23L798,1543.51a7.13,7.13,0,0,1-3.59-2.66l-21-27.36-2.42-7-9.91,5a7.19,7.19,0,0,1-3.22.76h-16.4a7.19,7.19,0,0,1-4.41-1.52l-14.82-11.56c-1.74-1.37.37-8.17.37-10.38l-3.14-11.65-7.2-3.21-2-1-1.88,1.53a7,7,0,0,1-3.28,1.51l-16.83,3a7.43,7.43,0,0,1-2.66,0l-19.09-3.76-.6-.15L602,1573.38a2.11,2.11,0,0,1-1.76.95h-18l103.64,219.46L720.13,1775C720.76,1774.57,711.92,1764.24,717.74,1773.07Z"/></path>
      <path class="southwest" data-town="Westport" data-tooltip="true" title="Westport" data-networks="01" d="M690.3,2122.35l-54.06,42.44a2.12,2.12,0,0,1-1.68.41,2,2,0,0,1-1.42-1l-8.81-15.1L614,2175.72l-11.41,62.22,17.65,19.67a2.12,2.12,0,0,1,.53,1.52l-4.91,86.64,7.9,1.34-.65-15.23,7.59-7.33v-17.31l9-12,10,6.09-3.11,11.85,2.46,7.36,7.79,1.86,10.27-5.7,6.12,7.86,4.4.65,7.14-5.07,7.24-2.57,4-6-6.58-12.66,8-10.68L722,2287l3.21,14.07-15.53,4.11,4.62,6L733.24,2299l11.3,5.53,18.27-11.81,1.59-5,.73-.32L743,2224.22Z"/></path>
      <path class="southwest" data-town="Norwalk" data-tooltip="true" title="Norwalk" data-networks="01" d="M517.57,2461.93l1.43-.08,2.74-10,.8-17.55,22.83-19.54-.92,19.65,6-.38,3.27-28.14,4,2.58c5.2,3.32,7.81,5.26,9.11,6.56,1.12-.09,3-.38,4.87-.72v-23.44l2.13-2.71L564.2,2372l-.93-21.22H586l-.57,8.24,12,4.43.52,8.48,2.12,1,.53-1.58v-14.07l11.08-11.07,4.9-86.4L598.81,2240a2.14,2.14,0,0,1-.5-1.78l10.61-57.88L493.53,2237.5,456.82,2318a2.59,2.59,0,0,1,.55.44l43,49.24a2.12,2.12,0,0,1,.48,1l14.3,81.5,1.1.6Z"/></path>
      <path class="southwest" data-town="Fairfield" data-tooltip="true" title="Fairfield" data-networks="01" d="M800.89,2254.74l24,7.79-1.68,3.16c-1.28,2.41-2.72,5.34-3.37,6.93,2.11,2.24,7.89,7.83,13.63,13.25l11.77-10.09,27.31-36.16,3.82-15.82,19.67-4,2.47-8.62,9.52-2.85,2.51,9,2.57-.77.57-12.5-9.45-4.73-1.15-3.71h-.48a2.09,2.09,0,0,1-1.65-.8l-17.29-22a2.13,2.13,0,0,1-.4-1.74,2.09,2.09,0,0,1,1.09-1.42l13.13-6.81,5.58-56.31-47.72-76.77-3.45-3.88H845l-25.14,33.19v10.82a2.1,2.1,0,0,1-.93,1.74l-3.15,2.1a2.08,2.08,0,0,1-2.66-.29l-18.34-18.86a2.08,2.08,0,0,1-.29-2.53l1.87-3.12-8.35-3.27-23.13,27.16a2.11,2.11,0,0,1-1.7.73L709.27,2071l-.35,1-15.65,47,53.55,103.46.12.27,22,63L782.2,2280Z"/></path>
      <path class="southwest" data-town="Greenwich" data-tooltip="true" title="Greenwich" data-networks="01" d="M319.26,2538.52l2.32-7L318.1,2505l-9.1-12.14a2.05,2.05,0,0,1-.35-.71l-4.63-17L164.87,2262,0,2371.31l140.14,196.2-2.06,20.16-9.46,17.83,7.59,21.84,6.25-5c1.24-2.1,4.82-13.49,7.51-23.15l.46-1.63,6.26-1.74.37-18,12-6.28,6.43,10.53-2.85,6.4,6.07-1.12,6.54,6.18,4.69-1.71.32-5.79,31.86-38.15,13.4-2.41.21-5.1-11.35-9,17.23-2.7,6.3-14.16,9.71,1.49v14.33l-1.4,4.47,6.09,4.65-1.48,13.32,15.42,9.13,24.28-11.49c-1.82-8.93-.66-10.86-.26-11.53C301.13,2537.42,302.34,2535.41,319.26,2538.52Z"/></path>
      <path class="southwest" data-town="New Canaan" data-tooltip="true" title="New Canaan" data-networks="01" d="M452.35,2317.68l36.88-80.84-19.8-11.1a2.1,2.1,0,0,1-1-1.17l-44.58-134.36-133.7,88.69,87.69,138.78Z"/></path>
      <path class="northwest" data-town="Sherman" data-tooltip="true" title="Sherman" data-networks="05" d="M464.33,1323.33,358.12,1064.88a7.32,7.32,0,0,1-.46-3.9l4-26.88-.11-6.53c-2.45-1.21-9.73-3.7-9.73-6.44v-5H311.72l-6.6,346.39Z"/></path>
      <path class="southwest" data-town="Wilton" data-tooltip="true" title="Wilton" data-networks="01" d="M609.72,2175.25l11.88-30.72-105.22-161L500,1960.35,458.17,2002a2.22,2.22,0,0,1-.62.43l-67.21,29.89,39.14,54.23-2,1.31,44.68,134.67L492,2233.59Z"/></path>
      <path class="northwest" data-town="New Fairfield" data-tooltip="true" title="New Fairfield" data-networks="05" d="M301.64,1543.38l199.19-45.18-22.93-67.78c-.13-.42-1.71-3.94-1.58-4.36l7.62-4.38a7.37,7.37,0,0,1-2.56-3l-8.19-16.47a7.1,7.1,0,0,1-.63-2.94l-.19-55.58-6.3-15.16L305,1366.85Z"/></path>
      <path class="northwest" data-town="Danbury" data-tooltip="true" title="Danbury" data-networks="05" d="M358.35,1705.29a2.11,2.11,0,0,1,1.63.78l34.47,42.7h30.43a2.11,2.11,0,0,1,2,1.52l17.9,62,66.31-20.36-28-92.27a2.11,2.11,0,0,1,.88-2.38l53.51-34V1644a2.08,2.08,0,0,1,1.07-1.82l3.12-1.76v-7.7l-6.22-24.88a2.22,2.22,0,0,1-.06-.51v-14.67a2.07,2.07,0,0,1,.85-1.68l3.08-2.26v-14.39H528.08a2.09,2.09,0,0,1-2-1.42l-23.92-70.71-200.62,45.49-3,157.6Z"/></path>
    </g>
  </g>
</svg>
  </div>

  <div class="data-div"></div>
</div>

<script>
  // Select 2.
  jQuery(document).ready(function() {
      jQuery('.map-select').select2();
  });

  // Bootstrap tooltips.
  jQuery('[data-tooltip="true"]').tooltip();

  // Network information.
  var network01 = ['01', 'CES', 'Christina Lye (lead)', 'Office hours: Mondays 12 to 3 p.m.', '203-365-8843', 'lyec@cestrumbull.org', 'Liz Parmelee', 'Office hours: Tuesdays 9 a.m. to 12 p.m.', '203-365-8913', 'parmelee@cestrumbull.org', '40 Lindeman Drive,<br>Trumbull, CT 06611',];
  var network02 = ['02', 'CREC', 'Jean Barresi (lead)', 'Fridays 9 a.m. to 12 p.m.', '860-324-3391', 'jbarresi@crec.org', '', '', '', '', '415 Silas Deane Highway, Suite 402<br>Wethersfield, CT 06109',];
  var network03 = ['03', 'CTAEYC', 'Lori Blake (lead)', 'Office hours: Mondays 9 to 11 a.m.<br>Thursdays 3 to 4:30 p.m.', '860-785-8148', 'lblake@ctaeyc.org', 'Karen Rainville', 'Office hours: Tuesdays 9:30 to 11:30 a.m.', '860-785-8148', 'krainville@ctaeyc.org', '111 Charter Oak Ave<br>Hartford, CT 06106',];
  var network04 = ['04', 'EASTCONN', 'Sheri Lambert (lead)', 'Office hours: Tuesdays 9 a.m. to 1 p.m.', '860-455-1585', 'slambert@eastconn.org', 'Cheryl LaMothe', 'Office hours: Mondays 2 to 4 p.m.', '860-455-1516', 'clamothe@eastconn.org', '376 Hartford Turnpike<br>Hampton, CT 06247',];
  var network05 = ['05', 'EdAdvance', 'Kristen Kennen (lead)', 'Office hours: Tuesdays 1 to 4 p.m.', '203-791-1904 ext.1189', 'kennen@edadvance.org', 'Donna Delohery', 'Office hours: Fridays 9 a.m. to 12 p.m.', '203-791-1904 ext.1161', 'delohery@edadvance.org', 'P.O. Box 909<br>355 Goshen Rd<br>Litchfield, CT 06759',];
  var network06 = ['06', 'LEARN', 'Carole Glenn (lead)', 'Office hours: Tuesdays 1 to 4 p.m.', '860-434-4800 ext.125', 'cglenn@learn.k12.ct.us', 'Lynn DePina', 'Office hours: Mondays 9:30 a.m. to 12:30 p.m.', '860-434-4800 ext.254', 'ldepina@learn.k12.ct.us', '44 Hatchetts Hill Road<br>Old Lyme, CT 06371',];




   // Create an HTML template and display network information.
  function getNetwork(name, contact, hours, phone, email, altcontact, althours, altphone, altemail, address) {
      jQuery('.data-div').append('<div class="network"><h3>'+name+'</h3><div class="contact">'+contact+'</div><div class="hours">'+hours+'</div><div class="phone">'+phone+'</div><div class="email"><a href="mailto:'+email+'">'+email+'</a></div><div class="contacttwo">'+altcontact+'</div><div class="althours">'+althours+'</div><div class="phone">'+altphone+'</div><div class="altemail"><a href="mailto:'+altemail+'">'+altemail+'</a></div><div class="address">'+address+'</div></div>');
  }

  // When you click a town in the dropdown...
  jQuery('.map-select').on('change', function(){
      var town_name = jQuery(this).find(':selected').val();
      jQuery('path[data-town="'+town_name+'"], polygon[data-town="'+town_name+'"]').trigger('click');
  });

  // When you click a town on the map...
  jQuery('path, polygon').on('click', function(e){

      // Get some variables.
      var town_name = jQuery(this).data('town');
      var network_array = [];
      var town_networks = jQuery(this).data('networks');

      // Clear the selected town and network information.
      jQuery('path, polygon').removeClass('active');
      jQuery('.data-div').html('');

      // Highlight the town.
      jQuery(this).addClass('active');

      // Add the town name.
      jQuery('.data-div').html('<div class="title">Agencies and AQIS facilitators serving '+town_name+'</div>');

      // Get the network IDs for this town and put into an array.
      if (town_networks.length == 0) {
          var target = jQuery('.data-div').append("We're sorry, there are no networks available in this area.");
      }
      else if (town_networks.length > 2) {
          town_networks = town_networks.split(', ');
          jQuery.each(town_networks, function(index, value) {
              network_array.push(value);
          });
      }
      else {
          network_array.push(town_networks);
      }

      // For each network, get its information.
      jQuery.each(network_array, function(index, value) {
        if (value == 01) { getNetwork(network01[1], network01[2], network01[3], network01[4], network01[5], network01[6], network01[7], network01[8], network01[9], network01[10]); }
        if (value == 02) { getNetwork(network02[1], network02[2], network02[3], network02[4], network02[5], network02[6], network02[7], network02[8], network02[9], network02[10]); }
        if (value == 03) { getNetwork(network03[1], network03[2], network03[3], network03[4], network03[5], network03[6], network03[7], network03[8], network03[9], network03[10]); }
        if (value == 04) { getNetwork(network04[1], network04[2], network04[3], network04[4], network04[5], network04[6], network04[7], network04[8], network04[9], network04[10]); }
        if (value == 05) { getNetwork(network05[1], network05[2], network05[3], network05[4], network05[5], network05[6], network05[7], network05[8], network05[9], network05[10]); }
        if (value == 06) { getNetwork(network06[1], network06[2], network06[3], network06[4], network06[5], network06[6], network06[7], network06[8], network06[9], network06[10]); }
      });
  });
</script>
