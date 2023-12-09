 <li class="checkout-item">
     <div class="avatar checkout-icon p-1">
         <div class="avatar-title rounded-circle  bg-green-400 text-white">
             2
         </div>
     </div>
     <div class="feed-item-list">
         <div>

             <h5 class="font-size-16 mb-1">Add Patients</h5>
             
             <a href="<?php echo e(route('patient.create')); ?>">
                <input type="button" class="btn btn-success" value="+"  style="float: right" />
                   </a>
             
             <div class="mb-3">
                 <?php if(count($patients) > 0): ?>
                     <div class="row" id="patient-list">
                         <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <div class="col-lg-4 col-sm-6 mb-2 patient-div">
                                 <div data-bs-toggle="collapse">
                                     <label class="card-radio-label mb-0">
                                         <input type="checkbox" name="patient[]" id="patient" class="card-radio-input"
                                             value="<?php echo e($patient->id); ?>">

                                         <div class="card-radio text-truncate p-3">
                                             <span class="fs-14 mb-2 d-block"><?php echo e(ucfirst($patient->name)); ?></span>
                                             <span class="text-muted fw-normal text-wrap mb-1 d-block">Age -
                                                 <?php echo e(ucfirst($patient->age)); ?></span>

                                             <span
                                                 class="text-muted fw-normal d-block"><?php echo e(ucfirst($patient->gender == '1' ? 'Male' : 'Female')); ?></span>
                                         </div>
                                     </label>
                                     <div class="action_box">

                                         <div class="edit-btn bg-light  rounded">

                                            <a href="<?php echo e(route('patient.edit', [$patient->id])); ?>" class=""
                                                >
                                                <i class="bx bxs-edit font-size-16"></i>
                                            </a>
                                       
                                         </div>
                                     </div>

                                 </div>
                             </div>
                             <div id="new_patient"></div>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                         <input type="hidden" name="new_patient[]" id="new_patient_textbox" class="card-radio-input"
                             value="">

                     </div>
                 <?php else: ?>
                    
                 <?php endif; ?>

                 <div class="col" style="display: flex;place-content: end">
                    <div class="text-end mt-2">
                        <input type="submit" id="pateint_tab_forward_btn" class="btn btn-success border border-grenn-500 text-black" value="Proceed">
                    </div>
                </div>


             </div>
         </div>
     </div>
 </li>
<?php /**PATH C:\xampp\htdocs\patholab\resources\views/Front-end/Checkout/template/patient.blade.php ENDPATH**/ ?>