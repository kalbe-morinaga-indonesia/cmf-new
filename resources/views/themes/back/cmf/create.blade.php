@extends('layouts.back')
@section('title','Buat CMF - CMF Online')

@section('content')
    <h4 class="fw-bold"><span class="text-muted fw-light">CMF / </span> Tambah</h4>

    <form action="{{route('cmf.store')}}" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
        @csrf
        <div class="row mb-4">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="department" class="form-label">Department</label>
                                    <input type="text" name="department" id="department" class="form-control @error('department') is-invalid @enderror" value="{{$department}}" readonly>
                                    @error('department')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="date" name="tanggal" id="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{old('tanggal')}}">
                                    @error('tanggal')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="no_cmf" class="form-label">No CMF</label>
                                    <input type="text" name="no_cmf" id="no_cmf" class="form-control @error('no_cmf') is-invalid @enderror" value="{{$no_cmf}}" readonly>
                                    @error('no_cmf')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="judul_perubahan" class="form-label">Judul Perubahan</label>
                                    <input type="text" name="judul_perubahan" id="judul_perubahan" class="form-control @error('judul_perubahan') is-invalid @enderror" value="{{old('judul_perubahan')}}">
                                    @error('judul_perubahan')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="perubahan" class="form-label">Perubahan</label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="perubahan" type="radio" id="mesin" value="Mesin">
                                        <label class="form-check-label" for="mesin">Mesin</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="perubahan" type="radio" id="proses" value="Proses">
                                        <label class="form-check-label" for="proses">Proses</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="perubahan" type="radio" id="system" value="System">
                                        <label class="form-check-label" for="system">System</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="perubahan" type="radio" id="lainnya" value="Lainnya">
                                        <label class="form-check-label" for="lainnya">Lainnya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-control" id="textOther" name="perubahan_other" type="text" placeholder="Lainnya">
                                    </div>
                                    @error('perubahan')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="jenis_perubahan" class="form-label">Jenis Perubahan</label>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-check form-check-inline mb-3">
                                                <input class="form-check-input" name="jenis_perubahan" type="radio" id="Instalasi" value="Instalasi">
                                                <label class="form-check-label" for="Instalasi">Instalasi</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-check form-check-inline mb-3">
                                                <input class="form-check-input" name="jenis_perubahan" type="radio" id="Formula" value="Formula">
                                                <label class="form-check-label" for="Formula">Formula</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-check form-check-inline mb-3">
                                                <input class="form-check-input" name="jenis_perubahan" type="radio" id="raw" value="Raw Material">
                                                <label class="form-check-label" for="raw">Raw Material</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-check form-check-inline mb-3">
                                                <input class="form-check-input" name="jenis_perubahan" type="radio" id="packaging" value="Packaging Material">
                                                <label class="form-check-label" for="packaging">Packaging Material</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-check form-check-inline mb-3">
                                                <input class="form-check-input" name="jenis_perubahan" type="radio" id="Spesifikasi" value="Spesifikasi Produk">
                                                <label class="form-check-label" for="Spesifikasi">Spesifikasi Produk</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-check form-check-inline mb-3">
                                                <input class="form-check-input" name="jenis_perubahan" type="radio" id="food" value="Food Safety Management">
                                                <label class="form-check-label" for="food">Food Safety Management</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-check form-check-inline mb-3">
                                                <input class="form-check-input" name="jenis_perubahan" type="radio" id="Oracle" value="Oracle">
                                                <label class="form-check-label" for="Oracle">Oracle</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-check form-check-inline mb-3">
                                                <input class="form-check-input" name="jenis_perubahan" type="radio" id="SMK3" value="SMK3">
                                                <label class="form-check-label" for="SMK3">SMK3</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-check form-check-inline mb-3">
                                                <input class="form-check-input" name="jenis_perubahan" type="radio" id="Halal" value="Halal Management">
                                                <label class="form-check-label" for="Halal">Halal Management</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="jenis_perubahan" type="radio" id="lainnya" value="Lainnya">
                                                <label class="form-check-label" for="jenis_perubahan">Lainnya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-control" id="jenisOther" name="jenis_perubahan_other" type="text" placeholder="Lainnya">
                                            </div>
                                        </div>
                                    </div>
                                    @error('jenis_perubahan')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="targer_implementasi" class="form-label">Target Implementasi</label>
                                    <input type="date" name="target_implementasi" id="target_implementasi" class="form-control @error('target_implementasi') is-invalid @enderror" value="{{old('target_implementasi')}}">
                                    @error('target_implementasi')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="tipe_perubahan" class="form-label">Tipe Perubahan</label>
                                    <div class="row">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="tipe_perubahan" type="radio" id="Permanent" value="Permanent">
                                            <label class="form-check-label" for="Permanent">Permanent</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="tipe_perubahan" type="radio" id="Temporary" value="Temporary">
                                            <label class="form-check-label" for="Temporary">Temporary</label>
                                        </div>
                                    </div>
                                    @error('tipe_perubahan')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-12">
                                <label for="alasan_perubahan" class="form-label">Alasan Perubahan</label>
                                <textarea name="alasan_perubahan" id="alasan_perubahan" cols="30" rows="10" class="form-control @error('alasan_perubahan') is-invalid @enderror"></textarea>
                                @error('alasan_perubahan')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-12">
                                <label for="dampak_terhadap_perubahan" class="form-label">Dampak Terhadap Perubahan</label>
                                <textarea name="dampak_terhadap_perubahan" id="dampak_terhadap_perubahan" cols="30" rows="10" class="form-control @error('dampak_terhadap_perubahan') is-invalid @enderror"></textarea>
                                @error('dampak_terhadap_perubahan')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-12">
                                <label for="deskripsi_perubahan" class="form-label">Deskripsi Perubahan</label>
                                <textarea name="deskripsi_perubahan" id="deskripsi_perubahan" cols="30" rows="10" class="form-control @error('deskripsi_perubahan') is-invalid @enderror"></textarea>
                                @error('deskripsi_perubahan')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="area_terkait" class="form-label">Area Terkait</label>
                                    <br>
                                    @foreach($subdepartments as $subdepartment)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="area_terkait[]" type="checkbox" id="{{$subdepartment->id}}" value="{{$subdepartment->id}}">
                                            <label class="form-check-label" for="{{$subdepartment->id}}">{{$subdepartment->txtNamaSubDept}}</label>
                                        </div>
                                    @endforeach
                                    @error('area_terkait')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-12">
                <div class="card mb-5 card-parent" >
                    <h5 class="card-header">Risk Assessment :</h5>
                    <hr class="my-0" />
                    <div class="card-body" id="dynamicAddRemove">
                        <div class="row mb-4">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="qcdsme" class="form-label">QCDSME</label>
                                    <select name="risk[0][qcdsme]" id="qcdsme" class="form-select @error('qcdsme') is-invalid @enderror">
                                        <option>Pilih</option>
                                        <option value="Quality">Quality</option>
                                        <option value="Food Safety">Food Safety</option>
                                        <option value="Cost">Cost</option>
                                        <option value="Delivery">Delivery</option>
                                        <option value="Safety">Safety</option>
                                        <option value="Moral">Moral</option>
                                        <option value="Environment">Environment</option>
                                    </select>
                                    @error('qcdsme')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="resiko" class="form-label">Resiko</label>
                                    <input type="text" name="risk[0][resiko]" id="resiko" class="form-control @error('resiko') is-invalid @enderror" value="{{old('resiko')}}">
                                    @error('resiko')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-12">
                                <label for="rencana_mitigasi" class="form-label">Rencana Mitigasi</label>
                                <textarea name="risk[0][rencana_mitigasi]" id="rencana_mitigasi" cols="30" rows="10" class="form-control @error('rencana_mitigasi') is-invalid @enderror"></textarea>
                                @error('rencana_mitigasi')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="rica" class="form-label">Rica</label>
                                    <select name="risk[0][rica]" id="rica" class="form-select @error('rica') is-invalid @enderror">
                                        <option>Pilih</option>
                                        <option value="Responsible">Responsible</option>
                                        <option value="Accountable">Accountable</option>
                                        <option value="Control">Control</option>
                                        <option value="Inform">Inform</option>
                                    </select>
                                    @error('rica')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="pic" class="form-label">PIC</label>
                                    <input type="text" name="risk[0][pic]" id="pic" class="form-control @error('pic') is-invalid @enderror" value="{{old('pic')}}">
                                    @error('pic')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="deadline" class="form-label">Deadline</label>
                                    <input type="date" name="risk[0][deadline]" id="deadline" class="form-control @error('deadline') is-invalid @enderror" value="{{old('deadline')}}">
                                    @error('deadline')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="level_risk" class="form-label">Level Risk</label>
                                    <select name="risk[0][level_risk]" id="level_risk" class="form-select @error('level_risk') is-invalid @enderror">
                                        <option>Pilih</option>
                                        <option value="High">High</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Low">Low</option>
                                    </select>
                                    @error('level_risk')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="risk[0][status]" id="status" class="form-select @error('status') is-invalid @enderror">
                                        <option>Pilih</option>
                                        <option value="Open">Open</option>
                                        <option value="Close">Close</option>
                                    </select>
                                    @error('status')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <button type="button" id="dynamic-ar" class="btn btn-dark">
                                <i class="bx bx-add-to-queue me-2"></i>
                                Tambah Risk
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2-multiple').select2({
                placeholder: 'Select an option'
            });
            $('.select2-multiple-department').select2({
                placeholder: 'Select an option'
            });
        });

        let i = 0;

        $("#dynamic-ar").click(function () {
            ++i;
            $("#dynamicAddRemove").append(`<div class="card-dynamic">
<div class="row mb-4">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="qcdsme" class="form-label">QCDSME</label>
                                    <select name="risk[${i}][qcdsme]" id="qcdsme" class="form-select @error('qcdsme') is-invalid @enderror">
                                        <option>Pilih</option>
                                        <option value="Quality">Quality</option>
                                        <option value="Food Safety">Food Safety</option>
                                        <option value="Cost">Cost</option>
                                        <option value="Delivery">Delivery</option>
                                        <option value="Safety">Safety</option>
                                        <option value="Moral">Moral</option>
                                        <option value="Environment">Environment</option>
                                    </select>
                                    @error('qcdsme')
            <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="resiko" class="form-label">Resiko</label>
                <input type="text" name="risk[${i}][resiko]" id="resiko" class="form-control @error('resiko') is-invalid @enderror" value="{{old('resiko')}}">
                                    @error('resiko')
            <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-lg-12">
            <label for="rencana_mitigasi" class="form-label">Rencana Mitigasi</label>
            <textarea name="risk[${i}][rencana_mitigasi]" id="rencana_mitigasi" cols="30" rows="10" class="form-control @error('rencana_mitigasi') is-invalid @enderror"></textarea>
                                @error('rencana_mitigasi')
            <div class="invalid-feedback">{{$message}}</div>
                                @enderror
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="rica" class="form-label">Rica</label>
                    <select name="risk[${i}][rica]" id="rica" class="form-select @error('rica') is-invalid @enderror">
                                        <option>Pilih</option>
                                        <option value="Responsible">Responsible</option>
                                        <option value="Accountable">Accountable</option>
                                        <option value="Control">Control</option>
                                        <option value="Inform">Inform</option>
                                    </select>
                                    @error('rica')
            <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="pic" class="form-label">PIC</label>
                <input type="text" name="risk[${i}][pic]" id="pic" class="form-control @error('pic') is-invalid @enderror" value="{{old('pic')}}">
                                    @error('pic')
            <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="deadline" class="form-label">Deadline</label>
                <input type="date" name="risk[${i}][deadline]" id="deadline" class="form-control @error('deadline') is-invalid @enderror" value="{{old('deadline')}}">
                                    @error('deadline')
            <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="level_risk" class="form-label">Level Risk</label>
                <select name="risk[${i}][level_risk]" id="level_risk" class="form-select @error('level_risk') is-invalid @enderror">
                                        <option>Pilih</option>
                                        <option value="High">High</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Low">Low</option>
                                    </select>
                                    @error('level_risk')
            <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="status" class="form-label">Status</label>
                <select name="risk[${i}][status]" id="status" class="form-select @error('status') is-invalid @enderror">
                                        <option>Pilih</option>
                                        <option value="Open">Open</option>
                                        <option value="Close">Close</option>
                                    </select>
                                    @error('status')
            <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <button type="button" id="dynamic-ar" class="btn btn-danger remove-input-field">
            <i class="bx bx-trash me-2"></i>
            Hapus Risk
        </button>
    </div>
</div>`);
        });
        $(document).on('click', '.remove-input-field', function () {
            $(this).parents('.card-dynamic').remove();
        });

        $('input[name="perubahan"]').click(function(e) {
            if(e.target.value === 'Lainnya') {
                $('#textOther').show().focus();
            } else {
                $('#textOther').hide();
            }
        })

        $('#textOther').hide();

        $('input[name="jenis_perubahan"]').click(function(e) {
            if(e.target.value === 'Lainnya') {
                $('#jenisOther').show().focus();
            } else {
                $('#jenisOther').hide();
            }
        })

        $('#jenisOther').hide();

    </script>
@endpush
