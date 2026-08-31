@extends('layouts.app') 
 
@section('content') 
 
<style> 
.container-box{width:94%;max-width:1250px;margin:15px auto 35px} 
.heading{text-align:center;margin-bottom:20px} 
.heading h1{color:#173b32;font-size:28px;margin:0 0 6px} 
.heading p{color:#718078;margin:0;font-size:14px} 
 
.actions{display:flex;flex-wrap:wrap;gap:9px;margin-bottom:22px;justify-content:center} 
.btn{display:inline-block;padding:9px 14px;border-radius:8px;text-decoration:none;border:0;color:#fff;font-size:13px;cursor:pointer} 
.add{background:#2e7d32} 
.data{background:#2878a6} 
.urdu{background:#7b4fa3} 
.pest{background:#ef6c00} 
.pest-urdu{background:#a64b6b} 
 
.success{background:#dff2e2;color:#205c2b;border:1px solid #b9dfbf;padding:10px 13px;border-radius:8px;margin-bottom:18px;text-align:center;font-size:14px} 
 
.crop-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:18px} 
 
.crop-card{ 
    background:#fff; 
    border:1px solid #dce5df; 
    border-radius:15px; 
    padding:15px; 
    box-shadow:0 5px 18px rgba(23,59,50,.07) 
} 
 
.crop-image{ 
    width:100%; 
    height:170px; 
    object-fit:cover; 
    border-radius:11px; 
    background:#eef3ef 
} 
 
.crop-card h3{ 
    font-size:19px; 
    color:#173b32; 
    margin:13px 0 10px; 
    text-align:center 
} 
 
.info{font-size:13px;color:#555;margin:4px 0} 
 
.badge{ 
    display:inline-block; 
    background:#e7f4e9; 
    color:#2e6b38; 
    border-radius:20px; 
    padding:5px 9px; 
    font-size:11px; 
    margin:6px 3px 0 0 
} 
 
.missing{ 
    background:#fff0e6; 
    color:#b85c00 
} 
 
.pest-row{ 
    margin-top:10px; 
    background:#f6f8f6; 
    border:1px solid #e0e7e1; 
    border-radius:9px; 
    padding:9px 10px; 
    display:flex; 
    align-items:center; 
    justify-content:center; 
    gap:8px 
} 
 
.pest-count{ 
    font-size:13px; 
    color:#42564a 
} 
 
.card-actions{ 
    display:flex; 
    justify-content:center; 
    margin-top:12px 
} 
 
.delete{ 
    background:#c62828 
} 
 
.delete-form{ 
    margin:0 
} 
 
.empty{ 
    background:#fff; 
    padding:30px; 
    border-radius:12px; 
    text-align:center; 
    color:#777; 
    grid-column:1/-1 
} 
 
.delete-modal{ 
    display:none; 
    position:fixed; 
    inset:0; 
    background:rgba(0,0,0,.45); 
    align-items:center; 
    justify-content:center; 
    z-index:5000 
} 
 
.modal-box{ 
    width:90%; 
    max-width:390px; 
    background:#fff; 
    border-radius:13px; 
    padding:24px; 
    text-align:center 
} 
 
.modal-box h2{ 
    font-size:21px; 
    margin:7px 0 10px 
} 
 
.modal-box p{ 
    font-size:13px; 
    color:#666; 
    margin-bottom:20px 
} 
 
.modal-buttons{ 
    display:flex; 
    justify-content:center; 
    gap:9px 
} 
 
.modal-buttons button{ 
    border:0; 
    border-radius:7px; 
    padding:9px 18px; 
    cursor:pointer; 
    font-size:13px 
} 
 
.cancel{ 
    background:#777; 
    color:#fff 
} 
 
.yes{ 
    background:#c62828; 
    color:#fff 
} 
 
html.urdu-mode .container-box{ 
    direction:rtl 
} 
 
html.urdu-mode .heading, 
.urdu-mode .crop-card{ 
    text-align:right 
} 
 
.urdu-mode .heading h1, 
.urdu-mode .crop-card h3{ 
    text-align:right 
} 
 
.urdu-mode .info{ 
    direction:rtl 
} 
 
.urdu-mode .badge{ 
    margin:6px 0 0 3px 
} 
 
.urdu-mode .pest-row{ 
    direction:rtl 
} 
 
.urdu-mode .card-actions{ 
    justify-content:flex-start 
} 
 
@media(max-width:950px){ 
    .crop-grid{ 
        grid-template-columns:repeat(2,1fr) 
    } 
} 
 
@media(max-width:600px){ 
    .container-box{ 
        width:94%; 
        margin-top:12px 
    } 
 
    .crop-grid{ 
        grid-template-columns:1fr 
    } 
 
    .actions{ 
        width:100%; 
        display:grid; 
        grid-template-columns:repeat(2, minmax(0,1fr)); 
        gap:7px; 
        margin-bottom:18px; 
        align-items:stretch 
    } 
 
    .actions .btn{ 
        width:100%; 
        min-width:0; 
        box-sizing:border-box; 
        padding:7px 5px; 
        font-size:11px; 
        line-height:1.25; 
        min-height:36px; 
        display:flex; 
        align-items:center; 
        justify-content:center; 
        text-align:center; 
        white-space:normal; 
    } 
 
    .actions .btn:nth-child(5){ 
        grid-column:1 / -1; 
        width:50%; 
        justify-self:center; 
    } 
 
    .heading{ 
        margin-bottom:16px 
    } 
 
    .heading h1{ 
        font-size:23px 
    } 
 
    .heading p{ 
        font-size:12px 
    } 
 
    .crop-image{ 
        height:190px 
    } 
} 
 
@media(max-width:380px){ 
    .actions{ 
        gap:6px 
    } 
 
    .actions .btn{ 
        padding:6px 4px; 
        font-size:10px; 
        min-height:34px; 
        border-radius:7px 
    } 
 
    .actions .btn:nth-child(5){ 
        width:55% 
    } 
} 
</style> 
 
<div class="container-box"> 
 
    <div class="heading"> 
        <h1>🌱 {{ t('Manage Crops') }}</h1> 
        <p>{{ t('Add and manage all crops in your website.') }}</p> 
    </div> 
 
    @if(session('success')) 
        <div class="success"> 
            {{ session('success') }} 
        </div> 
    @endif 
 
    <div class="actions"> 
 
        <a href="{{ route('admin.crop.create') }}" class="btn add"> 
            ➕ {{ t('Add Crop') }} 
        </a> 
 
        <a href="{{ route('admin.crop.data.create') }}" class="btn data"> 
            📚 {{ t('Add / Update Crop Data') }} 
        </a> 
 
        <a href="{{ route('admin.crop.urdu.data.create') }}" class="btn urdu"> 
             {{ t('Add / Update Urdu Crop Data') }} 
        </a> 
 
        <a href="{{ route('admin.pest.data.create') }}" class="btn pest"> 
            🐛 {{ t('Add / Update Pest Data') }} 
        </a> 
 
        <a href="{{ route('admin.pest.urdu.data.create') }}" class="btn pest-urdu"> 
             {{ t('Add / Update Urdu Pest Data') }} 
        </a> 
 
    </div> 
 
    <div class="crop-grid"> 
 
        @forelse($crops as $crop) 
 
            <div class="crop-card"> 
 
                @php 
                    $filename = $crop->image ? basename($crop->image) : null; 
                    $imageUrl = null; 
 
                    if ($filename && file_exists(public_path('images/'.$filename))) { 
                        $imageUrl = asset('images/'.$filename); 
                    } elseif ($filename && file_exists(public_path('images/crops/'.$filename))) { 
                        $imageUrl = asset('images/crops/'.$filename); 
                    } 
                @endphp 
 
                @if($imageUrl) 
 
                    <img 
                        src="{{ $imageUrl }}" 
                        class="crop-image" 
                        alt="{{ $crop->name }}" 
                    > 
 
                @else 
 
                    <div class="crop-image d-flex align-items-center justify-content-center"> 
                        🌱 
                    </div> 
 
                @endif 
 
                <h3> 
                    {{ local_text($crop, 'name') }} 
                </h3> 
 
                <div class="info"> 
                    <strong>{{ t('Category:') }}</strong> 
                    {{ local_text($crop, 'category') }} 
                </div> 
 
                <div class="info"> 
                    <strong>{{ t('Season:') }}</strong> 
                    {{ local_text($crop, 'season') }} 
                </div> 
 
                <div class="info"> 
                    <strong>{{ t('Type:') }}</strong> 
                    {{ $crop->type ? local_text($crop, 'type') : t('Not specified') }} 
                </div> 
 
                @if($crop->cropDetail) 
 
                    <span class="badge"> 
                        ✓ {{ t('Crop Data Added') }} 
                    </span> 
 
                @else 
 
                    <span class="badge missing"> 
                        {{ t('Crop Data Missing') }} 
                    </span> 
 
                @endif 
 
                @if($crop->urdu_completed) 
 
                    <span class="badge"> 
                        ✓ {{ t('Urdu Crop Complete') }} 
                    </span> 
 
                @else 
 
                    <span class="badge missing"> 
                        {{ t('Urdu Crop Missing') }} 
                    </span> 
 
                @endif 
 
                <div class="pest-row"> 
 
                    <span class="pest-count"> 
                        🐛 
                        {{ t('Pests') }}: 
                        {{ $crop->pestManagements->count() }} 
                    </span> 
 
                </div> 
 
                <div class="card-actions"> 
 
                    <form 
                        action="{{ route('admin.crop.delete', $crop->id) }}" 
                        method="POST" 
                        class="delete-form" 
                    > 
 
                        @csrf 
                        @method('DELETE') 
 
                        <button 
                            type="button" 
                            class="btn delete" 
                            onclick="openDeleteModal(this)" 
                        > 
                            🗑 {{ t('Delete Crop') }} 
                        </button> 
 
                    </form> 
 
                </div> 
 
            </div> 
 
        @empty 
 
            <div class="empty"> 
 
                <h3> 
                    {{ t('No crops available.') }} 
                </h3> 
 
                <p> 
                    {{ t('Use the Add Crop button above to add a crop.') }} 
                </p> 
 
            </div> 
 
        @endforelse 
 
    </div> 
 
</div> 
 
<div id="deleteModal" class="delete-modal"> 
 
    <div class="modal-box"> 
 
        <div style="font-size:38px"> 
            ⚠️ 
        </div> 
 
        <h2> 
            {{ t('Delete Crop?') }} 
        </h2> 
 
        <p> 
            {{ t('Are you sure you want to delete this crop?') }} 
        </p> 
 
        <div class="modal-buttons"> 
 
            <button 
                type="button" 
                class="cancel" 
                onclick="closeDeleteModal()" 
            > 
                {{ t('Cancel') }} 
            </button> 
 
            <button 
                type="button" 
                class="yes" 
                onclick="confirmDelete()" 
            > 
                {{ t('Yes, Delete') }} 
            </button> 
 
        </div> 
 
    </div> 
 
</div> 
 
<script> 
let selectedDeleteForm = null; 
 
function openDeleteModal(button) { 
    selectedDeleteForm = button.closest('form'); 
    document.getElementById('deleteModal').style.display = 'flex'; 
} 
 
function closeDeleteModal() { 
    document.getElementById('deleteModal').style.display = 'none'; 
    selectedDeleteForm = null; 
} 
 
function confirmDelete() { 
    if (selectedDeleteForm) { 
        selectedDeleteForm.submit(); 
    } 
} 
 
document.getElementById('deleteModal').addEventListener('click', function(event) { 
    if (event.target === this) { 
        closeDeleteModal(); 
    } 
}); 
</script> 
 
@endsection