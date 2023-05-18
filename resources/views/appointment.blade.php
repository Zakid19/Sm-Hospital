<section id="appointment" class="appointment section-bg">
    <div class="container">

      <div class="section-title">
        <h2>Make an Appointment</h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
      </div>

      <form action="{{ route('appointment.store') }}" method="post" role="form" class="appointment-form">
        @csrf
        <div class="row">
          <div class="col-md-4 form-group">
            <input type="text" name="fullname" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
            <div class="validate"></div>
          </div>
          <div class="col-md-4 form-group mt-3 mt-md-0">
            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">
            <div class="validate"></div>
          </div>
          <div class="col-md-4 form-group mt-3 mt-md-0">
            <input type="tel" class="form-control" name="no_phone" id="no_phone" placeholder="Your Phone" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
            <div class="validate"></div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 form-group mt-3">
            <input type="datetime-local" name="date" class="form-control datepicker" id="date" placeholder="Appointment Date" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
            <div class="validate"></div>
          </div>
          <div class="col-md-4 form-group mt-3">
            <select name="doctor_id" id="doctor_id" class="form-select">
              <option value="">Select Doctor</option>
              @foreach($doctors as $doc)
              <option value="{{ $doc->id }}">{{ $doc->name }} (Specialty {{ $doc->specialty }})</option>
              @endforeach
            </select>
            <div class="validate"></div>
          </div>
        </div>

        <div class="form-group mt-3">
          <textarea class="form-control" name="message" rows="5" placeholder="Message (Optional)"></textarea>
          <div class="validate"></div>
        </div>
        <div class="mb-3">
          {{-- <div class="loading">Loading</div>
          <div class="error-message"></div>
          <div class="sent-message">Your appointment request has been sent successfully. Thank you!</div> --}}
        </div>
        <div class="text-center"><button type="submit">Make an Appointment</button></div>
      </form>

    </div>
</section>
