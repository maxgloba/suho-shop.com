<?php $i = 0; while( have_rows('footer_text', 'option') ): the_row(); $i++; ?>
<template id="popup_<?php echo $i; ?>"><?php the_sub_field('text'); ?></template>
<?php endwhile; ?>

<?php /*
<template id="terms">
  <h2>Terms of Service</h2>
  <h3>1. Terms</h3>
  <p>By accessing the website at <a href="https://naomibox.co.uk">https://naomibox.co.uk</a>, you are agreeing to be bound by these terms of service, all applicable laws and regulations, and agree that you are responsible for compliance with any applicable local laws. If you do not agree with any of these terms, you are prohibited from using or accessing this site. The materials contained in this website are protected by applicable copyright and trademark law.</p>
  <h3>2. Use License</h3>
  <ol type="a">
     <li>Permission is granted to temporarily download one copy of the materials (information or software) on Quintillio Ltd's website for personal, non-commercial transitory viewing only. This is the grant of a license, not a transfer of title, and under this license you may not:
     <ol type="i">
         <li>modify or copy the materials;</li>
         <li>use the materials for any commercial purpose, or for any public display (commercial or non-commercial);</li>
         <li>attempt to decompile or reverse engineer any software contained on Quintillio Ltd's website;</li>
         <li>remove any copyright or other proprietary notations from the materials; or</li>
         <li>transfer the materials to another person or "mirror" the materials on any other server.</li>
     </ol>
      </li>
     <li>This license shall automatically terminate if you violate any of these restrictions and may be terminated by Quintillio Ltd at any time. Upon terminating your viewing of these materials or upon the termination of this license, you must destroy any downloaded materials in your possession whether in electronic or printed format.</li>
  </ol>
  <h3>3. Disclaimer</h3>
  <ol type="a">
     <li>The materials on Quintillio Ltd's website are provided on an 'as is' basis. Quintillio Ltd makes no warranties, expressed or implied, and hereby disclaims and negates all other warranties including, without limitation, implied warranties or conditions of merchantability, fitness for a particular purpose, or non-infringement of intellectual property or other violation of rights.</li>
     <li>Further, Quintillio Ltd does not warrant or make any representations concerning the accuracy, likely results, or reliability of the use of the materials on its website or otherwise relating to such materials or on any sites linked to this site.</li>
  </ol>
  <h3>4. Limitations</h3>
  <p>In no event shall Quintillio Ltd or its suppliers be liable for any damages (including, without limitation, damages for loss of data or profit, or due to business interruption) arising out of the use or inability to use the materials on Quintillio Ltd's website, even if Quintillio Ltd or a Quintillio Ltd authorized representative has been notified orally or in writing of the possibility of such damage. Because some jurisdictions do not allow limitations on implied warranties, or limitations of liability for consequential or incidental damages, these limitations may not apply to you.</p>
  <h3>5. Accuracy of materials</h3>
  <p>The materials appearing on Quintillio Ltd's website could include technical, typographical, or photographic errors. Quintillio Ltd does not warrant that any of the materials on its website are accurate, complete or current. Quintillio Ltd may make changes to the materials contained on its website at any time without notice. However Quintillio Ltd does not make any commitment to update the materials.</p>
  <h3>6. Links</h3>
  <p>Quintillio Ltd has not reviewed all of the sites linked to its website and is not responsible for the contents of any such linked site. The inclusion of any link does not imply endorsement by Quintillio Ltd of the site. Use of any such linked website is at the user's own risk.</p>
  <h3>7. Modifications</h3>
  <p>Quintillio Ltd may revise these terms of service for its website at any time without notice. By using this website you are agreeing to be bound by the then current version of these terms of service.</p>
  <h3>8. Governing Law</h3>
  <p>These terms and conditions are governed by and construed in accordance with the laws of United Kingdom and you irrevocably submit to the exclusive jurisdiction of the courts in that State or location.</p>
</template>

<template id="privacy">
  <h2>Privacy Policy</h2>
  <p>Your privacy is important to us. It is Quintillio Ltd's policy to respect your privacy regarding any information we may collect from you across our website, <a href="https://naomibox.co.uk">https://naomibox.co.uk</a>, and other sites we own and operate.</p>
  <p>We only ask for personal information when we truly need it to provide a service to you. We collect it by fair and lawful means, with your knowledge and consent. We also let you know why we’re collecting it and how it will be used.</p>
  <p>We only retain collected information for as long as necessary to provide you with your requested service. What data we store, we’ll protect within commercially acceptable means to prevent loss and theft, as well as unauthorized access, disclosure, copying, use or modification.</p>
  <p>We don’t share any personally identifying information publicly or with third-parties, except when required to by law.</p>
  <p>Our website may link to external sites that are not operated by us. Please be aware that we have no control over the content and practices of these sites, and cannot accept responsibility or liability for their respective privacy policies.</p>
  <p>You are free to refuse our request for your personal information, with the understanding that we may be unable to provide you with some of your desired services.</p>
  <p>Your continued use of our website will be regarded as acceptance of our practices around privacy and personal information. If you have any questions about how we handle user data and personal information, feel free to contact us.</p>
  <p>This policy is effective as of 13 January 2021.</p>
</template>

<template id="delivery">
  <h2>Delivery information</h2>
  <p>As soon as you confirm your purchase, we will begin preparing your order, and it will be shipped to you within 1-2 business days from your date of purchase.</p>
  <p>You will be sent a tracking number for your package (via email) once it has left our warehouse.</p>
  <p>Once your order has been shipped, please allow 3-7 business days for your order to arrive, though some locations may take slightly longer.</p>
</template>

<template id="refunds">
  <h2>Refunds and Returns</h2>
  <p>30 Days No Worries Return</p>
  <p>When purchasing from us we want you to have the best experience possible to enjoy your puzzles. But in the event that you are unhappy with the goods you have received or you change your mind, you have 30 days from date of purchase to arrange a return. Unfortunately after 30 days we will not be able to offer a refund unless the product is faulty but you have 30 days for an exchange.</p>
</template>

<template id="contact">
  <h2>Contact Us</h2>
  <h3>ADDRESS</h3>
  <p>Bridgwater Somerset, United Kingdom</p>
  <h3>EMAIL</h3>
  <p><a href="mailto:support@naomibox.co.uk">support@naomibox.co.uk</a></p>
  <h3>PHONE</h3>
  <p><a href="tel:08082710523">0808 271 0523</a></p>
</template>

*/ ?>

<section class="popup">
  <div class="popup-inner">
    <button class="popup-close" id="closePopup"><i class="far fa-times"></i></button>
    <div id="popupContentBox"></div>
  </div>
</section>
