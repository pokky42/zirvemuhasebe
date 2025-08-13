<section id="faq" class="faq_section">
			<div class="container">
				<div class="faq_content">
					<div class="row">
						<div class="col-md-8">
							<div class="faq_accordion">
								<div class="accordion" id="accordionExample">
									<?php
                        $cek = $db->query("SELECT * FROM sss WHERE durum='0' ORDER BY sira ASC")->fetchAll(PDO::FETCH_ASSOC);
                        foreach($cek as $key => $goster){
                            $collapseId = 'collapse_'.$key; 
                        ?>
									<div class="faq_area">
										<div class="faq-header  headline" id="heading01">
											<h3>
												<button class="faq_title" type="button" data-toggle="collapse" data-target="#collapse01" aria-expanded="true" aria-controls="collapse01">
													<?=$goster["adi"]?>
												</button>
											</h3>
										</div>
										<div id="collapse01" class="collapse show" aria-labelledby="heading01" data-parent="#accordionExample">
											<div class="faq-body">
											    <?=$goster["aciklama"]?>
											</div>
										</div>
									</div>
									<?php }?>
								</div>
							</div>
						</div>
						<!-- /faq question -->
						<!-- /side bar -->
					</div>
				</div>
			</div>
		</section>