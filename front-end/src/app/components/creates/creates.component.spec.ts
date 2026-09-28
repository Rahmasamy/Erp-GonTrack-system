import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CreatesComponent } from './creates.component';

describe('CreatesComponent', () => {
  let component: CreatesComponent;
  let fixture: ComponentFixture<CreatesComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [CreatesComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(CreatesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
