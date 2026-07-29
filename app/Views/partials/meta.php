<?php

$path = service('uri')->getPath();
$url = trim($path, '/');
if ($url === '' || $url === 'index.php') {
    $url = null;
} else {
    $url = preg_replace('/\.[^.\/]+$/', '', $url);
}

$metaHtml = '';

switch ($url) {
    case 'hair-transplant':
        $metaHtml  = '<title>Hair Transplant in India | Cost, Techniques & Planning at IHT</title>';
        $metaHtml .= '<meta name="description" content="Hair transplant in India explained in detail. Learn about cost, techniques, planning, recovery, and who is suitable for a safe, long-term result at IHT.">';
        $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/hair-transplant">';
        break;

    case 'about-us':
        $metaHtml  = '<title>About IHT Clinics | India Hair Transplant (IHT)</title>';
        $metaHtml .= '<meta name="hair-index-url" content="Discover the team, values, and clinical approach behind India Hair Transplant (IHT) and how we deliver structured, ethical hair restoration.">';
        $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/about-us" />';
        break;

    case 'male-hair-transplant':
        $metaHtml  = '<title>Male Hair Transplant in India | Natural Results by IHT Clinic</title>';
        $metaHtml .= '<meta name="description" content="Male hair transplant at IHT (India Hair Transplant Clinic) with doctor-led planning, natural hairline design, advanced FUE techniques, recovery guidance, and long-term result expectations.">';
        $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/male-hair-transplant" />';
        break;

    case 'female-hair-transplant':
        $metaHtml  = '<title>Female Hair Transplant in India | Safe & Personalised Care at IHT</title>';
        $metaHtml .= '<meta name="description" content="Female hair transplant at IHT (India Hair Transplant Clinic) for thinning and hairline concerns, with personalised assessment, safe technique selection, density planning, and post-procedure care.">';
        $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/female-hair-transplant" />';
        break;

    case 'hair-transplant-cost':
        $metaHtml  = '<title>Hair Transplant Cost in India | Graft Price & Factors Explained – IHT</title>';
        $metaHtml .= '<meta name="description" content="Know hair transplant cost in India at IHT Clinic. Learn how graft count, technique, hair loss grade, donor area, and medical planning affect the final price after evaluation.">';
        $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/hair-transplant-cost" />';
        break;

    case 'terms-and-conditions':
        $metaHtml  = '<title>Terms & Conditions | India Hair Transplant (IHT)</title>';
        $metaHtml .= '<meta name="description" content="Read the Terms & Conditions governing the use of India Hair Transplant (IHT) website, consultations, appointments, treatments, pricing, cancellations, and patient responsibilities.">';
        $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/terms-and-conditions" />';
        break;

    case 'privacy-policy':
        $metaHtml  = '<title>Privacy Policy | India Hair Transplant (IHT)</title>';
        $metaHtml .= '<meta name="description" content="Learn how India Hair Transplant (IHT) collects, uses, and protects personal information shared through our website, consultations, and communication channels.">';
        $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/privacy-policy" />';
        break;

    case 'prp-hair-treatment':
        $metaHtml  = '<title>PRP Hair Treatment in India | Cost, Procedure, Benefits & Results at IHT</title>';
        $metaHtml .= '<meta name="description" content="Looking for PRP hair treatment in India? Learn about the cost, procedure, and benefits of PRP hair treatment. Find out who it is suitable for and what results you can realistically expect.">';
        $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/prp-hair-treatment" />';
        break;

    case 'beard-transplant':
        $metaHtml  = '<title>Beard Hair Transplant in India | Cost, Procedure, Results & Recovery</title>';
        $metaHtml .= '<meta name="description" content="Considering a beard hair transplant in India? Learn about cost per graft, procedure steps, recovery timeline, results, risks, and expert-planned beard transplant treatment at IHT.">';
        $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/beard-transplant" />';
        break;

    case 'faqs':
        $metaHtml  = '<title>FAQs on Hair Transplant</title>';
        $metaHtml .= '<meta name="description" content="All FAQs on hair transplant in India covering success rate, grafts required, donor area safety, recovery timeline, cost planning, results, and post-transplant care at IHT.">';
        $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/faqs" />';
        break;

    case 'eyebrow-hair-transplant':
        $metaHtml  = '<title>Eyebrow Hair Transplant in India | Permanent, Natural Brow Restoration</title>';
        $metaHtml .= '<meta name="description" content="Restore fuller, natural-looking eyebrows with a permanent eyebrow hair transplant in India. Surgeon-led treatment with real hair growth and long-term results.">';
        $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/eyebrow-hair-transplant" />';
        break;

    case 'moustache-transplant':
        $metaHtml  = '<title>Moustache Hair Transplant in India | Cost, Grafts & Experienced Surgeons</title>';
        $metaHtml .= '<meta name="description" content="Restore a fuller, natural-looking moustache with a permanent moustache hair transplant in India. Surgeon-led treatment with transparent cost planning, precise graft placement, and long-term results.">';
        $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/moustache-transplant" />';
        break;

    case 'body-hair-transplant':
        $metaHtml  = '<title>Body Hair Transplant in India | Cost, Techniques & Experienced Surgeons</title>';
        $metaHtml .= '<meta name="description" content="Body Hair Transplant in India for advanced baldness and limited scalp donor hair. Surgeon-led BHT using FUE & Bio-FUE techniques with ethical planning, transparent cost evaluation, and long-term natural results.">';
        $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/body-hair-transplant" />';
        break;
     case 'contact-us':
        $metaHtml  = '<title>Contact India Hair Transplant (IHT) | Book Consultation with Hair Experts</title>';
        $metaHtml .= '<meta name="description" content="Get in touch with India Hair Transplant (IHT) to book a consultation, ask questions, or speak with experienced hair transplant specialists. We’re here to help you plan the right treatment safely.">';
        $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/contact-us" />';
        break;
            
      case 'fue-hair-transplant':
        $metaHtml  = '<title>FUE Hair Transplant in India | Cost, Procedure & Natural Results at IHT</title>';
        $metaHtml .= '<meta name="description" content="Learn about FUE hair transplant in India at India Hair Transplant (IHT). Understand the procedure, cost, recovery timeline, risks, and who is an ideal candidate for safe, natural, surgeon-led results.">';
        $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/fue-hair-transplant" />';
        break;
        case 'fut-hair-transplant':
        $metaHtml  = '<title>FUT Hair Transplant in India | Cost, Strip Method & Long-Term Results at IHT</title>';
        $metaHtml .= '<meta name="description" content="Explore FUT hair transplant in India at India Hair Transplant (IHT). Learn about the strip method, cost, recovery, scarring, and who is suitable for FUT with surgeon-led planning and realistic outcomes.">';
        $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/fut-hair-transplant" />';
        break;
        case 'hair-transplant-in-bangalore':
            $metaHtml  = '<title>Hair Transplant Clinic in Bangalore – Cost & Expert Surgeons</title>';
            $metaHtml .= '<meta name="description" content="Trusted hair transplant clinic in Bangalore offering advanced Bio-FUE and FUE procedures by experienced surgeons. Transparent graft cost and personalised planning. Book your free consultation today.">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/hair-transplant-in-bangalore" />';
            break;
        
        case 'hair-transplant-in-delhi':
            $metaHtml  = '<title>Hair Transplant Clinic in Delhi – Cost & Expert Surgeons</title>';
            $metaHtml .= '<meta name="description" content="Trusted hair transplant clinic in Delhi offering advanced Bio-FUE and FUE procedures by experienced surgeons. Transparent graft cost and personalised planning. Book your free consultation today.">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/hair-transplant-in-delhi" />';
            break;
        
        case 'hair-transplant-in-ludhiana':
            $metaHtml  = '<title>Hair Transplant in Ludhiana | FUE & Bio-FUE | IHT Clinic</title>';
            $metaHtml .= '<meta name="description" content="Hair transplant in Ludhiana at IHT Clinic. FUE & Bio-FUE procedures by qualified surgeons since 2007. Transparent graft-based pricing. Book a consultation today.">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/hair-transplant-in-ludhiana" />';
            break;
        
        case 'hair-transplant-in-noida':
            $metaHtml  = '<title>Hair Transplant Clinic in Noida – Cost & Expert Surgeons</title>';
            $metaHtml .= '<meta name="description" content="Trusted hair transplant clinic in Noida offering advanced Bio-FUE and FUE procedures by experienced surgeons. Transparent graft cost and personalised planning. Book your free consultation today.">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/hair-transplant-in-noida" />';
            break;
        
        case 'hair-transplant-in-gurgaon':
            $metaHtml  = '<title>Hair Transplant Clinic in Gurgaon – Cost & Expert Surgeons</title>';
            $metaHtml .= '<meta name="description" content="Trusted hair transplant clinic in Gurgaon offering advanced Bio-FUE and FUE procedures by experienced surgeons. Transparent graft cost and personalised planning. Book your free consultation today.">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/hair-transplant-in-gurgaon" />';
            break;
        
        case 'hair-transplant-in-chandigarh':
            $metaHtml  = '<title>Hair Transplant Clinic in Chandigarh – Cost & Expert Surgeons</title>';
            $metaHtml .= '<meta name="description" content="Trusted hair transplant clinic in Chandigarh offering advanced Bio-FUE and FUE procedures by experienced surgeons. Transparent graft cost and personalised planning. Book your free consultation today.">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/hair-transplant-in-chandigarh" />';
            break;
        
        case 'hair-transplant-in-jalandhar':
            $metaHtml  = '<title>Hair Transplant Clinic in Jalandhar – Cost & Expert Surgeons</title>';
            $metaHtml .= '<meta name="description" content="Trusted hair transplant clinic in Jalandhar offering advanced Bio-FUE and FUE procedures by experienced surgeons. Transparent graft cost and personalised planning. Book your free consultation today.">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/hair-transplant-in-jalandhar" />';
            break;
        
        case 'hair-transplant-in-amritsar':
            $metaHtml  = '<title>Hair Transplant Clinic in Amritsar – Cost & Expert Surgeons</title>';
            $metaHtml .= '<meta name="description" content="Trusted hair transplant clinic in Amritsar offering advanced Bio-FUE and FUE procedures by experienced surgeons. Transparent graft cost and personalised planning. Book your free consultation today.">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/hair-transplant-in-amritsar" />';
            break;
        
        case 'hair-transplant-in-bathinda':
            $metaHtml  = '<title>Hair Transplant Clinic in Bathinda – Cost & Expert Surgeons</title>';
            $metaHtml .= '<meta name="description" content="Trusted hair transplant clinic in Bathinda offering advanced Bio-FUE and FUE procedures by experienced surgeons. Transparent graft cost and personalised planning. Book your free consultation today.">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/hair-transplant-in-bathinda" />';
            break;
        
        case 'hair-transplant-in-patiala':
            $metaHtml  = '<title>Hair Transplant Clinic in Patiala – Cost & Expert Surgeons</title>';
            $metaHtml .= '<meta name="description" content="Trusted hair transplant clinic in Patiala offering advanced Bio-FUE and FUE procedures by experienced surgeons. Transparent graft cost and personalised planning. Book your free consultation today.">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/hair-transplant-in-patiala" />';
            break;
        
        case 'hair-transplant-in-fazilka':
            $metaHtml  = '<title>Hair Transplant Clinic in Fazilka – Cost & Expert Surgeons</title>';
            $metaHtml .= '<meta name="description" content="Trusted hair transplant clinic in Fazilka offering advanced Bio-FUE and FUE procedures by experienced surgeons. Transparent graft cost and personalised planning. Book your free consultation today.">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/hair-transplant-in-fazilka" />';
            break;
        
        case 'hair-transplant-in-shri-muktsar-sahib':
            $metaHtml  = '<title>Hair Transplant Clinic in Shri Muktsar Sahib – Cost & Expert Surgeons</title>';
            $metaHtml .= '<meta name="description" content="Trusted hair transplant clinic in Shri Muktsar Sahib offering advanced Bio-FUE and FUE procedures by experienced surgeons. Transparent graft cost and personalised planning. Book your free consultation today.">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/hair-transplant-in-shri-muktsar-sahib" />';
            break;
        
        case 'hair-transplant-in-sri-ganganagar':
            $metaHtml  = '<title>Hair Transplant Clinic in Sri Ganganagar – Cost & Expert Surgeons</title>';
            $metaHtml .= '<meta name="description" content="Trusted hair transplant clinic in Sri Ganganagar offering advanced Bio-FUE and FUE procedures by experienced surgeons. Transparent graft cost and personalised planning. Book your free consultation today.">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/hair-transplant-in-sri-ganganagar" />';
            break;
        
        case 'hair-transplant-in-hanumangarh':
            $metaHtml  = '<title>Hair Transplant Clinic in Hanumangarh – Cost & Expert Surgeons</title>';
            $metaHtml .= '<meta name="description" content="Trusted hair transplant clinic in Hanumangarh offering advanced Bio-FUE and FUE procedures by experienced surgeons. Transparent graft cost and personalised planning. Book your free consultation today.">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/hair-transplant-in-hanumangarh" />';
            break;
        
        case 'hair-transplant-in-kota':
            $metaHtml  = '<title>Hair Transplant Clinic in Kota – Cost & Expert Surgeons</title>';
            $metaHtml .= '<meta name="description" content="Trusted hair transplant clinic in Kota offering advanced Bio-FUE and FUE procedures by experienced surgeons. Transparent graft cost and personalised planning. Book your free consultation today.">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/hair-transplant-in-kota" />';
            break;
        
        case 'hair-transplant-in-jaipur':
            $metaHtml  = '<title>Hair Transplant Clinic in Jaipur – Cost & Expert Surgeons</title>';
            $metaHtml .= '<meta name="description" content="Trusted hair transplant clinic in Jaipur offering advanced Bio-FUE and FUE procedures by experienced surgeons. Transparent graft cost and personalised planning. Book your free consultation today.">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/hair-transplant-in-jaipur" />';
            break;
        
        case 'hair-transplant-in-agra':
            $metaHtml  = '<title>Hair Transplant Clinic in Agra – Cost & Expert Surgeons</title>';
            $metaHtml .= '<meta name="description" content="Trusted hair transplant clinic in Agra offering advanced Bio-FUE and FUE procedures by experienced surgeons. Transparent graft cost and personalised planning. Book your free consultation today.">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/hair-transplant-in-agra" />';
            break;
        
        case 'hair-transplant-in-meerut':
            $metaHtml  = '<title>Hair Transplant Clinic in Meerut – Cost & Expert Surgeons</title>';
            $metaHtml .= '<meta name="description" content="Trusted hair transplant clinic in Meerut offering advanced Bio-FUE and FUE procedures by experienced surgeons. Transparent graft cost and personalised planning. Book your free consultation today.">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/hair-transplant-in-meerut" />';
            break;
        
        case 'hair-transplant-in-mohali':
            $metaHtml  = '<title>Hair Transplant Clinic in Mohali – Cost & Expert Surgeons</title>';
            $metaHtml .= '<meta name="description" content="Trusted hair transplant clinic in Mohali offering advanced Bio-FUE and FUE procedures by experienced surgeons. Transparent graft cost and personalised planning. Book your free consultation today.">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/hair-transplant-in-mohali" />';
            break;
        
        case 'hair-transplant-in-panchkula':
            $metaHtml  = '<title>Hair Transplant Clinic in Panchkula – Cost & Expert Surgeons</title>';
            $metaHtml .= '<meta name="description" content="Trusted hair transplant clinic in Panchkula offering advanced Bio-FUE and FUE procedures by experienced surgeons. Transparent graft cost and personalised planning. Book your free consultation today.">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/hair-transplant-in-panchkula" />';
            break;
        
        /* NOTE: "Punjab" is a state-level page; spelling is correct. */
        case 'hair-transplant-in-punjab':
            $metaHtml  = '<title>Hair Transplant Clinic in Punjab – Cost & Expert Surgeons</title>';
            $metaHtml .= '<meta name="description" content="Trusted hair transplant clinic in Punjab offering advanced Bio-FUE and FUE procedures by experienced surgeons. Transparent graft cost and personalised planning. Book your free consultation today.">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/hair-transplant-in-punjab" />';
            break;
        
        /* Correct spelling: Zirakpur (not zirkpur) */
        case 'hair-transplant-in-zirakpur':
            $metaHtml  = '<title>Hair Transplant Clinic in Zirakpur – Cost & Expert Surgeons</title>';
            $metaHtml .= '<meta name="description" content="Trusted hair transplant clinic in Zirakpur offering advanced Bio-FUE and FUE procedures by experienced surgeons. Transparent graft cost and personalised planning. Book your free consultation today.">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/hair-transplant-in-zirakpur" />';
            break;
        
        case 'hair-transplant-in-morinda':
            $metaHtml  = '<title>Hair Transplant Clinic in Morinda – Cost & Expert Surgeons</title>';
            $metaHtml .= '<meta name="description" content="Trusted hair transplant clinic in Morinda offering advanced Bio-FUE and FUE procedures by experienced surgeons. Transparent graft cost and personalised planning. Book your free consultation today.">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/hair-transplant-in-morinda" />';
            break;

        case 'gfc-hair-treatment':
            $metaHtml  = '<title>GFC Therapy for Hair Loss in India | Cost, Benefits & Results | IHT Clinic</title>';
            $metaHtml .= '<meta name="description" content="Learn how GFC therapy helps reduce hair fall and support existing hair follicles. Explore benefits, procedure, cost, and results at India Hair Transplant (IHT).">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/gfc-hair-treatment" />';
            break;
        case 'unshaven-hair-transplant':
            $metaHtml  = '<title>Unshaven FUE Hair Transplant | No-Shave & Long Hair Transplant – IHT Clinic</title>';
            $metaHtml .= '<meta name="description" content="Unshaven FUE hair transplant allows hair restoration without shaving the head. Learn the procedure, cost, benefits, recovery and whether no-shave FUE is right for you.">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/unshaven-hair-transplant" />';
            break;
        case 'hair-loss':
            $metaHtml  = '<title>Hair Loss in India: Causes, Types, Stages & Treatment Options | IHT Clinics</title>';
            $metaHtml .= '<meta name="description" content="Understand the causes of hair loss, different types, stages of hair loss, and available treatments. Learn when hair loss can be controlled or reversed.">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/hair-loss" />';
            break;
        case 'hair-loss-in-men':
            $metaHtml  = '<title>Hair Loss in Men: Causes, Male Pattern Baldness & Treatment Options</title>';
            $metaHtml .= '<meta name="description" content="Understand the causes of hair loss in men including male pattern baldness, symptoms to watch for, and available treatments such as medication, PRP, and hair transplant.">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/hair-loss-in-men" />';
            break;
        case 'hair-loss-in-women':
            $metaHtml  = '<title>Hair Loss in Women: Causes, Female Pattern Hair Loss & Treatments</title>';
            $metaHtml .= '<meta name="description" content="Discover the causes of hair loss in women including hormonal changes, genetics, and stress, along with treatment options to help manage and restore hair density.">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/hair-loss-in-women" />';
            break;
                    case 'scalp-folliculitis':
            $metaHtml  = '<title>Scalp Folliculitis: Causes, Symptoms, Hair Loss & Treatment</title>';
            $metaHtml .= '<meta name="description" content="Learn about scalp folliculitis, its causes, symptoms, and treatment options. Discover how early diagnosis and proper scalp care can help reduce inflammation and support healthy hair growth.">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/scalp-folliculitis" />';
            break;

        case 'dandruff':
            $metaHtml  = '<title>Dandruff: Causes, Symptoms, Hair Fall & Treatment</title>';
            $metaHtml .= '<meta name="description" content="Understand dandruff, its common causes, symptoms, and treatment options. Learn how proper scalp evaluation and care can help manage flakes, itching, and overall scalp health.">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/dandruff" />';
            break;

        case 'seborrheic-dermatitis':
            $metaHtml  = '<title>Seborrheic Dermatitis: Causes, Symptoms, Hair Loss & Treatment</title>';
            $metaHtml .= '<meta name="description" content="Explore seborrheic dermatitis causes, symptoms, and treatment options. Learn how managing scalp inflammation, greasy flakes, and itching can help improve scalp comfort and hair health.">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/seborrheic-dermatitis" />';
            break;

        case 'scalp-psoriasis':
            $metaHtml  = '<title>Scalp Psoriasis: Causes, Symptoms, Hair Loss & Treatment</title>';
            $metaHtml .= '<meta name="description" content="Discover scalp psoriasis causes, symptoms, and treatment options. Learn how proper diagnosis and scalp care can help manage thick scales, itching, inflammation, and protect scalp health.">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/scalp-psoriasis" />';
            break;
        case 'androgenetic-alopecia':
            $metaHtml  = '<title>Androgenetic Alopecia: Causes, Symptoms, Pattern Hair Loss & Treatment</title>';
            $metaHtml .= '<meta name="description" content="Learn about androgenetic alopecia, the most common cause of pattern hair loss in men and women. Understand causes, early symptoms, hair loss patterns, and treatment options to manage thinning hair.">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/androgenetic-alopecia" />';
            break;
                case 'alopecia-areata':
            $metaHtml  = '<title>Alopecia Areata: Causes, Symptoms, Patchy Hair Loss & Treatment</title>';
            $metaHtml .= '<meta name="description" content="Understand alopecia areata, an autoimmune condition causing patchy hair loss. Learn about causes, early signs, diagnosis, and effective treatment options to manage hair regrowth.">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/alopecia-areata" />';
            break;

        case 'telogen-effluvium':
            $metaHtml  = '<title>Telogen Effluvium: Causes, Hair Shedding, Symptoms & Treatment</title>';
            $metaHtml .= '<meta name="description" content="Learn about telogen effluvium, a common cause of sudden hair shedding. Discover causes, symptoms, hair fall patterns, and treatments to restore healthy hair growth.">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/telogen-effluvium" />';
            break;
        
        case 'anagen-effluvium':
            $metaHtml  = '<title>Anagen Effluvium: Rapid Hair Loss Causes, Symptoms & Treatment</title>';
            $metaHtml .= '<meta name="description" content="Explore anagen effluvium, a condition causing rapid hair loss during the growth phase. Learn about causes like chemotherapy, symptoms, and treatment options for recovery.">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/anagen-effluvium" />';
            break;
        
        case 'traction-alopecia':
            $metaHtml  = '<title>Traction Alopecia: Hair Loss from Tight Hairstyles, Causes & Treatment</title>';
            $metaHtml .= '<meta name="description" content="Understand traction alopecia caused by tight hairstyles, braids, or extensions. Learn early signs, hairline thinning patterns, and treatment options to prevent permanent hair loss.">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/traction-alopecia" />';
            break;
        
        case 'cicatricial-alopecia':
            $metaHtml  = '<title>Scarring (Cicatricial) Alopecia: Permanent Hair Loss Causes & Treatment</title>';
            $metaHtml .= '<meta name="description" content="Learn about scarring alopecia, a condition causing permanent hair loss due to follicle damage. Understand symptoms, causes, and treatment options to control progression.">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/cicatricial-alopecia" />';
            break;
            
        case 'dr-kapil-dua':
            $metaHtml  = '<title>Dr. Kapil Dua &mdash; Hair Transplant Surgeon | IHT India</title>';
            $metaHtml .= '<meta name="description" content="Dr. Kapil Dua is Chairman &amp; Chief Hair Transplant Surgeon at IHT. Past President of ISHRS USA, AAHRS Asia, and AHRS India &mdash; the only Indian surgeon to lead all three bodies.">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/dr-kapil-dua" />';
            break;
        case 'dr-aman-dua':
            $metaHtml  = '<title>Dr. Aman Dua &mdash; Dermatologist &amp; Hair Restoration Specialist | IHT</title>';
            $metaHtml .= '<meta name="description" content="Dr. Aman Dua is Co-Founder of IHT and one of India\'s leading dermatologists specialising in hair restoration, hair loss diagnosis, and regenerative treatments including PRP and GFC.">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/dr-aman-dua" />';
            break;
            
        case 'blog':
            $metaHtml  = '<title>Hair Loss &amp; Hair Transplant Blog | Expert Guides | IHT</title>';
            $metaHtml .= '<meta name="description" content="Practical, doctor-reviewed articles on hair loss causes, hair transplant procedures, recovery, cost, PRP, and non-surgical treatments — by IHT specialists.">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/blog/" />';
            break;

        case 'blog/hair-loss':
            $metaHtml  = '<title>Hair Loss Types, Causes &amp; Diagnosis | IHT Blog</title>';
            $metaHtml .= '<meta name="description" content="Understand androgenetic alopecia, telogen effluvium, alopecia areata and more. Expert articles on hair loss causes, patterns and diagnosis for Indian patients.">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/blog/hair-loss/" />';
            break;

        case 'blog/hair-transplant':
            $metaHtml  = '<title>Hair Transplant Guides &amp; Articles | IHT Blog</title>';
            $metaHtml .= '<meta name="description" content="In-depth guides on hair transplant procedures — candidacy, slit making, graft handling, hairline design, and what to expect before and after surgery in India.">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/blog/hair-transplant/" />';
            break;

        case 'blog/hair-transplant-cost':
            $metaHtml  = '<title>Hair Transplant Cost in India | Honest Pricing Guide | IHT Blog</title>';
            $metaHtml .= '<meta name="description" content="Clear, honest articles on hair transplant cost in India — graft-wise pricing, what is included, why prices vary across clinics, and how to avoid unsafe cheap packages.">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/blog/hair-transplant-cost/" />';
            break;

        case 'blog/transplant-techniques':
            $metaHtml  = '<title>FUE, Bio-FUE, DHI &amp; Hair Transplant Techniques | IHT Blog</title>';
            $metaHtml .= '<meta name="description" content="Detailed guides on FUE, Bio-FUE, DHI, FUT and unshaven hair transplant techniques — how each works, who it suits, and differences in cost and outcomes.">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/blog/transplant-techniques/" />';
            break;

        case 'blog/recovery-and-aftercare':
            $metaHtml  = '<title>Hair Transplant Recovery &amp; Aftercare Guide | IHT Blog</title>';
            $metaHtml .= '<meta name="description" content="Week-by-week hair transplant recovery guide — shock loss, washing instructions, dos and don\'ts, and realistic growth timelines after your procedure in India.">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/blog/recovery-aftercare/" />';
            break;

        case 'blog/non-surgical-treatments':
            $metaHtml  = '<title>PRP, GFC &amp; Non-Surgical Hair Loss Treatments | IHT Blog</title>';
            $metaHtml .= '<meta name="description" content="Expert articles on PRP therapy, GFC treatment, LLLT, minoxidil and other non-surgical hair loss options — who benefits, session count, and realistic outcomes.">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/blog/non-surgical-treatments/" />';
            break;

        case 'blog/hair-loss-medications':
            $metaHtml  = '<title>Hair Loss Medications &amp; Prescription Treatments | IHT Blog</title>';
            $metaHtml .= '<meta name="description" content="Evidence-based articles on finasteride, minoxidil, dutasteride and other hair loss medications — how they work, who they suit, side effects, and when to consult a doctor.">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/blog/hair-loss-medications/" />';
            break;

        case 'blog/scalp-conditions':
            $metaHtml  = '<title>Scalp Conditions &amp; Scalp Health | IHT Blog</title>';
            $metaHtml .= '<meta name="description" content="Articles on dandruff, seborrheic dermatitis, scalp psoriasis, folliculitis and other scalp conditions that affect hair health — causes, diagnosis and treatment options.">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/blog/scalp-conditions/" />';
            break;

        case 'blog/womens-hair-loss':
            $metaHtml  = '<title>Women\'s Hair Loss &amp; Female Hair Transplant | IHT Blog</title>';
            $metaHtml .= '<meta name="description" content="Articles on female pattern hair loss, postpartum shedding, PCOS-related hair loss, hormonal causes, PRP for women, and female hair transplant options in India.">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/blog/womens-hair-loss/" />';
            break;

        case 'blog/results-and-case-studies':
            $metaHtml  = '<title>Hair Transplant Results &amp; Before After | IHT Blog</title>';
            $metaHtml .= '<meta name="description" content="Honest articles on hair transplant results — what to expect at 3, 6 and 12 months, graft survival rates, success factors, and how to evaluate clinic outcomes.">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/blog/results-recovery/" />';
            break;
            
        case 'blog/shock-loss-after-hair-transplant':
            $metaHtml  = '<title>Shock Loss After Hair Transplant: Causes, Timeline & What to Expect</title>';
            $metaHtml .= '<meta name="description" content="Experiencing hair loss after your transplant? Shock loss is temporary. Learn why it happens, the month-by-month recovery timeline, and aftercare tips to reduce shedding.">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/blog/shock-loss-after-hair-transplant" />';
            break;
        case 'blog/gym-after-hair-transplant':
            $metaHtml  = '<title>Gym After Hair Transplant: When Can You Exercise and What to Avoid</title>';
            $metaHtml .= '<meta name="description" content="When can you go to the gym after a hair transplant? IHT\'s medical team shares the week-by-week exercise timeline, what activities to avoid, and why Indian patients need extra caution.">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/blog/gym-after-hair-transplant" />';
            break;
        case 'blog/kapil-sharma-hair-transplant':
            $metaHtml  = '<title>Kapil Sharma Hair Transplant: His Hairline Journey and What It Tells Us</title>';
            $metaHtml .= '<meta name="description" content="Fans have noticed Kapil Sharma\'s changing hairline for years. We examine what his transformation suggests and what hair restoration options are available in India today.">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/blog/kapil-sharma-hair-transplant" />';
            break;
        
        case 'blog/hair-transplant-clinic-in-delhi':
            $metaHtml  = '<title>Hair Transplant in Delhi: What to Know Before You Choose a Clinic</title>';
            $metaHtml .= '<meta name="description" content="Planning a hair transplant in Delhi? IHT covers candidacy, techniques, cost breakdown, surgeon credentials to verify, and Delhi-specific aftercare tips before you book.">';
            $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com/blog/hair-transplant-clinic-in-delhi" />';
            break;
                            

    default:
        $metaHtml  = '<title>Hair Transplant Clinic in India | Experienced Hair Transplant Surgeons at IHT</title>';
        $metaHtml .= '<meta name="description" content="IHT is a doctor-led hair transplant clinic in India providing advanced hair restoration with personalised planning, modern techniques, and medical supervision.">';
        $metaHtml .= '<link rel="canonical" href="https://indiahairtransplant.com" />';
        break;
}


echo $metaHtml;
