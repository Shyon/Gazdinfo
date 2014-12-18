 <div id="content" align="center">
<table>
<form action="<?php ECHO base_url(); ?>/index.php/addnew" method="post" enctype=multipart/form-data>
<tr>
  <td>Étel neve: <input type="text" name="pname"></td>
</tr>
<tr>
<td>
  Leírás:<textarea rows=6 cols=50 name="memo"></textarea>
 </td>
</tr>

<tr><td>Db:: <input type="text" name="quantity"/></td></tr>
<tr><td>Ára: <input type="text" name="purchase"/></td></tr>
<tr><td>Brutto: <input type="text" name="brutto"/></td></tr>
<tr><td>Netto: <input type="text" name="netto"/></td></tr>
<tr><td><input type="file" name="kep"/></td></tr>
<tr><td><input type="submit" name="add" value="Beszúrás"/></td></tr>
<input type="hidden" name="submitted" value="true" />

</form>


</table>
</div>