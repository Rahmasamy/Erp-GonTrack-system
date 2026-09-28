import { CommonModule } from '@angular/common';
import { Component } from '@angular/core';
import { RouterLink, RouterOutlet } from '@angular/router';

@Component({
  selector: 'app-payment-basic',
  standalone: true,
  imports: [RouterOutlet, RouterLink, CommonModule],
  templateUrl: './payment-basic.component.html',
  styleUrl: './payment-basic.component.css',
})
export class PaymentBasicComponent {

}
