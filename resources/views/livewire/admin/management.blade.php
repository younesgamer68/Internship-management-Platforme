<div>

    <!-- Flash Notifications -->
    @if (session('company-created'))
        <div class="card mb-24" style="border-color: var(--green); background-color: var(--green-bg); padding: 16px; border-radius: var(--radius);">
            <div class="flex items-center gap-12" style="color: var(--green-dark); font-weight: 600;">
                <i class="fas fa-circle-check" style="font-size: 16px;"></i>
                <span>{{ session('company-created') }}</span>
            </div>
        </div>
    @endif

    @if (session('intern-created'))
        <div class="card mb-24" style="border-color: var(--green); background-color: var(--green-bg); padding: 16px; border-radius: var(--radius);">
            <div class="flex items-center gap-12" style="color: var(--green-dark); font-weight: 600;">
                <i class="fas fa-circle-check" style="font-size: 16px;"></i>
                <span>{{ session('intern-created') }}</span>
            </div>
        </div>
    @endif

    <!-- Two Column Forms Grid -->
    <div class="two-col-grid">
      
      <!-- Register Company Section -->
      <section id="companies" class="card scroll-mt-24">
        <div class="card-header">
          <span class="card-title"><i class="fas fa-plus-circle text-primary" style="margin-right: 8px;"></i>Register a Company</span>
        </div>
        <div class="card-body">
          <p class="text-gray mb-16" style="font-size: 13px;">Create the company profile and its manager account in one step.</p>

          <form wire:submit="createCompany" class="settings-form">
            <div class="form-group">
              <label class="form-label">Company Name</label>
              <input wire:model="companyName" type="text" placeholder="e.g. Acme Corporation" class="form-control" />
              @error('companyName') <p class="text-sm text-danger mt-4"><i class="fas fa-triangle-exclamation"></i> {{ $message }}</p> @enderror
            </div>
            
            <div class="form-group">
              <label class="form-label">Company Slug (optional)</label>
              <input wire:model="companySlug" type="text" placeholder="e.g. acme-corp" class="form-control" />
              @error('companySlug') <p class="text-sm text-danger mt-4"><i class="fas fa-triangle-exclamation"></i> {{ $message }}</p> @enderror
            </div>

            <div class="form-row">
              <div class="form-group">
                <label class="form-label">Company Email</label>
                <input wire:model="companyEmail" type="email" placeholder="e.g. contact@acme.com" class="form-control" />
                @error('companyEmail') <p class="text-sm text-danger mt-4"><i class="fas fa-triangle-exclamation"></i> {{ $message }}</p> @enderror
              </div>
              <div class="form-group">
                <label class="form-label">Phone Number</label>
                <input wire:model="companyPhone" type="text" placeholder="e.g. +1 555-0199" class="form-control" />
                @error('companyPhone') <p class="text-sm text-danger mt-4"><i class="fas fa-triangle-exclamation"></i> {{ $message }}</p> @enderror
              </div>
            </div>

            <div style="border-top: 1px solid rgba(229, 231, 235, 0.6); padding-top: 16px; margin-top: 8px;">
              <h4 class="font-semibold mb-16" style="color: var(--gray-800); font-size: 13px;"><i class="fas fa-user-tie text-primary" style="margin-right: 8px;"></i>Manager Details</h4>
              
              <div class="form-row">
                <div class="form-group">
                  <label class="form-label">Manager Name</label>
                  <input wire:model="managerName" type="text" placeholder="e.g. John Doe" class="form-control" />
                  @error('managerName') <p class="text-sm text-danger mt-4"><i class="fas fa-triangle-exclamation"></i> {{ $message }}</p> @enderror
                </div>
                <div class="form-group">
                  <label class="form-label">Manager Email</label>
                  <input wire:model="managerEmail" type="email" placeholder="e.g. j.doe@acme.com" class="form-control" />
                  @error('managerEmail') <p class="text-sm text-danger mt-4"><i class="fas fa-triangle-exclamation"></i> {{ $message }}</p> @enderror
                </div>
              </div>
              
              <div class="form-group" style="margin-top: 8px;">
                <label class="form-label">Manager Password</label>
                <input wire:model="managerPassword" type="password" placeholder="••••••••" class="form-control" />
                @error('managerPassword') <p class="text-sm text-danger mt-4"><i class="fas fa-triangle-exclamation"></i> {{ $message }}</p> @enderror
              </div>
            </div>

            <div class="form-footer" style="margin-top: 8px;">
              <button type="submit" class="btn btn-primary w-full"><i class="fas fa-plus" style="margin-right: 4px;"></i> Create Company Profile</button>
            </div>
          </form>
        </div>
      </section>

      <!-- Register Intern Section -->
      <section id="interns" class="card scroll-mt-24">
        <div class="card-header">
          <span class="card-title"><i class="fas fa-plus-circle text-green" style="margin-right: 8px;"></i>Register a Student</span>
        </div>
        <div class="card-body">
          <p class="text-gray mb-16" style="font-size: 13px;">Create a new student account to join the platform.</p>

          <form wire:submit="createStudent" class="settings-form">

            <div class="form-row">
              <div class="form-group">
                <label class="form-label">First Name</label>
                <input wire:model="studentFirstName" type="text" placeholder="e.g. Jane" class="form-control" />
                @error('studentFirstName') <p class="text-sm text-danger mt-4"><i class="fas fa-triangle-exclamation"></i> {{ $message }}</p> @enderror
              </div>
              <div class="form-group">
                <label class="form-label">Last Name</label>
                <input wire:model="studentLastName" type="text" placeholder="e.g. Smith" class="form-control" />
                @error('studentLastName') <p class="text-sm text-danger mt-4"><i class="fas fa-triangle-exclamation"></i> {{ $message }}</p> @enderror
              </div>
            </div>

            <div class="form-row">
              <div class="form-group">
                <label class="form-label">Email</label>
                <input wire:model="studentEmail" type="email" placeholder="e.g. j.smith@gmail.com" class="form-control" />
                @error('studentEmail') <p class="text-sm text-danger mt-4"><i class="fas fa-triangle-exclamation"></i> {{ $message }}</p> @enderror
              </div>
              <div class="form-group">
                <label class="form-label">Password</label>
                <input wire:model="studentPassword" type="password" placeholder="••••••••" class="form-control" />
                @error('studentPassword') <p class="text-sm text-danger mt-4"><i class="fas fa-triangle-exclamation"></i> {{ $message }}</p> @enderror
              </div>
            </div>

            <div class="form-row">
              <div class="form-group">
                <label class="form-label">University</label>
                <input wire:model="studentUniversity" type="text" placeholder="e.g. Harvard University" class="form-control" />
                @error('studentUniversity') <p class="text-sm text-danger mt-4"><i class="fas fa-triangle-exclamation"></i> {{ $message }}</p> @enderror
              </div>
              <div class="form-group">
                <label class="form-label">Field of Study</label>
                <input wire:model="studentFieldOfStudy" type="text" placeholder="e.g. Computer Science" class="form-control" />
                @error('studentFieldOfStudy') <p class="text-sm text-danger mt-4"><i class="fas fa-triangle-exclamation"></i> {{ $message }}</p> @enderror
              </div>
            </div>

            <div class="form-footer" style="margin-top: 24px;">
              <button type="submit" class="btn btn-green w-full"><i class="fas fa-plus" style="margin-right: 4px;"></i> Register Student Profile</button>
            </div>
          </form>
        </div>
      </section>

    </div>
</div>