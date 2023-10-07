 <li class="checkout-item">
     <div class="avatar checkout-icon p-1">
         <div class="avatar-title rounded-circle bg-primary">
             2{{-- <i class="bx bxs-truck text-white font-size-20"></i> --}}
         </div>
     </div>
     <div class="feed-item-list">
         <div>

             <h5 class="font-size-16 mb-1">Add Patients</h5>
             {{-- <p class="text-muted text-truncate mb-4">Neque porro quisquam est</p> --}}
             <a href="{{route('patient.create')}}">
                <input type="button" class="btn btn-success" value="+"  style="float: right" />
                   </a>
             
             <div class="mb-3">
                 @if (count($patients) > 0)
                     <div class="row" id="patient-list">
                         @foreach ($patients as $patient)
                             <div class="col-lg-4 col-sm-6 mb-2 patient-div">
                                 <div data-bs-toggle="collapse">
                                     <label class="card-radio-label mb-0">
                                         <input type="checkbox" name="patient[]" id="patient" class="card-radio-input"
                                             value="{{ $patient->id }}">

                                         <div class="card-radio text-truncate p-3">
                                             <span class="fs-14 mb-2 d-block">{{ ucfirst($patient->name) }}</span>
                                             <span class="text-muted fw-normal text-wrap mb-1 d-block">Age -
                                                 {{ ucfirst($patient->age) }}</span>

                                             <span
                                                 class="text-muted fw-normal d-block">{{ ucfirst($patient->gender == '1' ? 'Male' : 'Female') }}</span>
                                         </div>
                                     </label>
                                     <div class="action_box">

                                         <div class="edit-btn bg-light  rounded">

                                             <a href="#" class="delete_patient" data-id="{{ $patient->id }}">
                                                 <i class="bx bxs-trash font-size-16"></i>
                                             </a>
                                         </div>
                                     </div>

                                 </div>
                             </div>
                             <div id="new_patient"></div>
                         @endforeach

                         <input type="hidden" name="new_patient[]" id="new_patient_textbox" class="card-radio-input"
                             value="">

                     </div>
                 @else
                    
                 @endif

                 <div class="col" style="display: flex;place-content: end">
                    <div class="text-end mt-2">
                        <input type="submit" id="pateint_tab_forward_btn" class="btn btn-success" value="Proceed">
                    </div>
                </div>


             </div>
         </div>
     </div>
 </li>
