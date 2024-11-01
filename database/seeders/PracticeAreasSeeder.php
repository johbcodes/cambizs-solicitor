<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PracticeAreasSeeder extends Seeder
{
    public function run()
    {
        $practiceAreas = [
            ['name' => 'Personal Injury', 'description' => "Personal injury law helps you recover when someone else's negligence causes you harm. If you've been injured in an accident, a personal injury lawyer can fight for the compensation you deserve."],
            ['name' => 'Corporate Law', 'description' => "Corporate law ensures businesses operate legally. If you're forming a company, navigating mergers, or need legal counsel for business operations, a corporate lawyer is essential."],
            ['name' => 'Will & Inheritance', 'description' => "Wills and inheritance law ensures your assets are distributed according to your wishes after you pass away. If you need to draft a will, navigate probate, or face an inheritance dispute, a wills and inheritance lawyer can provide expert guidance."],
            ['name' => 'Financial Disputes', 'description' => "Financial disputes can be devastating. If you're facing debt issues, investment losses, or fraud, a financial disputes lawyer can help you recover what's rightfully yours."],
            ['name' => 'Grievance & Gross Misconduct', 'description' => "Grievance procedures ensure fair treatment at work. If you're facing disciplinary action or have an unresolved workplace complaint, a grievance lawyer can advocate for your rights."],
            ['name' => 'Contract Law | Housing Law Restructuring & Insolvency', 'description' => "Contracts are legally binding agreements. If you're facing a contract dispute or need help drafting a secure agreement, a contract lawyer can protect your interests."],
            ['name' => 'Employment & Labor', 'description' => "Employment and labor laws protect workers' rights. If you're facing unfair treatment, wage disputes, or discrimination in the workplace, an employment lawyer is your advocate."],
            ['name' => 'EU', 'description' => "EU law governs the European Union. If you're doing business within the EU or face legal issues related to EU regulations, a specialist EU lawyer can guide you."],
            ['name' => 'Intellectual Property', 'description' => "Intellectual property law protects your ideas and creations. If you need to secure a patent, trademark, or copyright, or if someone infringes on your intellectual property, an IP lawyer can safeguard your innovations."],
            ['name' => 'Litigation', 'description' => "Litigation is the process of resolving disputes through the courts. If you're facing a lawsuit or need to sue someone, a litigation lawyer will skillfully represent you throughout the legal process."],
            ['name' => 'Private Client', 'description' => "Private client law provides tailored legal services to wealthy individuals and families. If you need estate planning, tax advice, or help managing complex assets, a private client lawyer offers discreet and expert counsel."],
            ['name' => 'Shipping', 'description' => "Shipping law governs the transportation of goods by sea. If you're involved in maritime commerce, a shipping lawyer can help with contracts, cargo disputes, and regulatory compliance."],
            ['name' => 'Public Company, Equity Finance & Taxation', 'description' => "Tax law is a complex field governing how individuals and businesses pay taxes. If you're facing complicated tax issues, an audit, or need to minimize your tax burden, a tax lawyer can offer strategic advice."],
            ['name' => 'Real Estate & Property', 'description' => "Real estate law covers the buying, selling, and leasing of property. If you're purchasing a home, involved in a property dispute, or developing land, a real estate lawyer protects your investment."],
            ['name' => 'Insurance', 'description' => "Insurance law protects your rights when it comes to insurance policies. If you're facing denied claims, disputes with an insurer, or need help understanding coverage, an insurance lawyer can help."],
            ['name' => 'Immigration', 'description' => "Immigration law governs the process of moving to a new country. When faced with complex immigration procedures or legal hurdles, an immigration lawyer can help you navigate the system."],
            ['name' => 'Media, Entertainment & Sport', 'description' => "Media, entertainment, and sports law covers the unique legal issues facing these industries. If you need contracts, intellectual property protection, or help with broadcasting rights, a specialist lawyer in this field can help."],
            ['name' => 'Health | Medical Negligence', 'description' => "Health law covers medical care, patient privacy, and malpractice. If you've suffered due to medical negligence or have concerns about healthcare rights, a health law specialist can help."],
            ['name' => 'Family Law', 'description' => "Family law addresses sensitive matters like divorce, adoption, and custody. If you're facing family transitions, a family lawyer can provide compassionate support and legal expertise."],
            ['name' => 'Human Rights, Moral & Ethics', 'description' => "Human rights laws protect the basic freedoms of every person. If your fundamental rights have been violated, a human rights lawyer will champion your cause."],
            ['name' => 'Civil Rights | Common Law & Disputes', 'description' => "Civil rights laws protect you from discrimination based on race, gender, religion, and more. If your rights have been violated, a civil rights lawyer can fight for justice and compensation."],
            ['name' => 'Criminal Law', 'description' => "Criminal law deals with offenses against society. If you've been charged with a crime, a criminal lawyer is crucial to defend your rights and secure the best possible outcome."],
            ['name' => 'Animal Law', 'description' => "Animal law protects the welfare of animals. If you've witnessed animal cruelty, faced legal issues with your pet, or advocate for animal rights, a specialist animal lawyer can offer guidance and representation."],
            ['name' => 'Admiralty | Maritime Law', 'description' => "Admiralty and maritime law governs activities and incidents on the sea. If you've been injured in a maritime accident, face cargo disputes, or need legal guidance on maritime regulations, an admiralty lawyer can help."],
            ['name' => 'Constitutional Law', 'description' => "Constitutional law upholds the fundamental principles of your country's governing document. If you believe your constitutional rights have been infringed, a constitutional lawyer can advocate for you."],
            ['name' => 'Education Law', 'description' => "Education law protects student rights and ensures schools function fairly. If you face discrimination in education or have a dispute with a school, an education lawyer can offer expert counsel."],
            ['name' => 'Environmental & Natural Resource Law', 'description' => "Environmental law aims to protect our planet. If you're concerned about pollution, development impacts, or conservation, an environmental lawyer can help you take legal action."],
            ['name' => 'Military & Forces Law', 'description' => "Military and forces law addresses the specific legal needs of service members and their families. If you're facing disciplinary action, court-martial, or need help with military benefits, a military law specialist is essential."],
            ['name' => 'Business & Law', 'description' => "Business law ensures smooth operations and protects your interests. If you're starting a business, drafting contracts, or navigating legal complexities, a business lawyer is essential for success."],
            ['name' => 'Municipal Law', 'description' => "Municipal law governs cities, towns, and local governments. If you have a dispute with your local government, need help with zoning regulations, or face other municipal legal issues, a municipal lawyer can guide you."],
        ];

        DB::table('practice_areas')->insert($practiceAreas);
    }
}
