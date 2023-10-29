<label for="mulai_filter">Tanggal Mulai:</label>
<input value="{{$mulai_filter}}" type="text" name="mulai_filter" id="mulai_filter">
<label for="selesai_filter" class="ml-3">Tanggal Selesai:</label>
<input value="{{$selesai_filter}}" type="text"  name="selesai_filter" id="selesai_filter">
<div>
  <label for="stat_filter" class="mt-3">Status:</label>
</div>
<select class="form-select mb-3 select2" placeholder="Default select example" name="stat_filter">
    <option value="{{$stat_filter}}" selected>{{$stat_filter}}</option>
</select>
<div>
  <label for="institution_filter" class="mt-3">Institusi:</label>
</div>
<select class="form-select mb-3 select2" placeholder="Default select example" name="institution_filter" >
    <option value="{{$institution_filter}}" selected>{{$institution_filter}}</option>
</select>