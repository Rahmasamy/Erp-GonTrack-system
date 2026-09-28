import { Component, ElementRef, ViewChild } from '@angular/core';
import { TableComponent } from '../table/table.component';
import { PaymentService } from '../../servises/payment.service';
import { RouterLink, RouterOutlet } from '@angular/router';
import { CommonModule } from '@angular/common';
import { FormControl, FormsModule, ReactiveFormsModule } from '@angular/forms';
import { AsyncPipe } from '@angular/common';
import { MatAutocompleteModule } from '@angular/material/autocomplete';
import { MatInputModule } from '@angular/material/input';
import { MatFormFieldModule } from '@angular/material/form-field';
import { CampgianService } from '../../servises/campgian.service';

@Component({
  selector: 'app-payment',
  standalone: true,
  imports: [
    TableComponent,
    RouterLink,
    RouterOutlet,
    CommonModule,
    FormsModule,
    MatFormFieldModule,
    MatInputModule,
    MatAutocompleteModule,
    ReactiveFormsModule,
    AsyncPipe,
  ],
  templateUrl: './payment.component.html',
  styleUrls: ['./payment.component.css'],
})
export class PaymentComponent {
  x: boolean = false;
  data: any = [];
  filteredOptions: string[] = [];
  options: string[] = ['One', 'Two', 'Three', 'Four', 'Five'];
  myControl = new FormControl('');

  @ViewChild('input') input: ElementRef<HTMLInputElement> | undefined =
    undefined;

  constructor(
    private paymentServise: PaymentService,
    private compgainService: CampgianService
  ) {
    this.getAllPayments();
    this.getAllCampgian();
    this.filteredOptions = this.options.slice();
  }

  filter(): void {
    if (this.input) {
      const filterValue = this.input.nativeElement.value.toLowerCase();
      this.filteredOptions = this.options.filter((o) =>
        o.toLowerCase().includes(filterValue)
      );
    }
  }

  getAllPayments() {
    this.paymentServise.getAllPayments().subscribe(
      (response) => {
        console.log(response);
        this.data = response.data;
      },
      (err) => {
        console.log(err);
      }
    );
  }
  displayFn(value: string): string {
    return value ? value : '';
  }
  getAllCampgian() {
    this.compgainService.getAllCampgian().subscribe(
      (response) => {
        console.log('compgian', response);
      },
      (error) => {
        console.log('compgian', error);
      }
    );
  }
}
