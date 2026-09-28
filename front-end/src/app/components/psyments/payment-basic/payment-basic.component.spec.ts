import { ComponentFixture, TestBed } from '@angular/core/testing';

import { PaymentBasicComponent } from './payment-basic.component';

describe('PaymentBasicComponent', () => {
  let component: PaymentBasicComponent;
  let fixture: ComponentFixture<PaymentBasicComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [PaymentBasicComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(PaymentBasicComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
