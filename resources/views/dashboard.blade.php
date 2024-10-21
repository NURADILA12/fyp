fdgdfagagasgd

<form id="logoutForm" action="{{ route('logout') }}" method="POST" class="mt-auto">
    @csrf
    <button type="submit" class="btn btn-danger">
        <i class="bi bi-box-arrow-right"></i> Logout
    </button>
</form>